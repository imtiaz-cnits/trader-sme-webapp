<?php

namespace App\Services;

use App\Models\MasterTrader;
use App\Models\CopyConnection;
use App\Models\TradeHistory;
use App\Models\UserRiskConfig;
use App\Models\User;
use Carbon\Carbon;
use App\Events\TradeUpdated;
use App\Notifications\TradeExecutedNotification;

class TradeExecutionService
{
    public function executeTrade($masterId, $symbol, $type, $masterLot, $entryPrice)
    {
        // 1. Search for the Master Trader
        $master = MasterTrader::find($masterId);
        if (!$master) {
            return ['success' => false, 'message' => 'Master Trader not found!'];
        }

        // 2. Get all active copy connections for the Master Trader
        $activeConnections = CopyConnection::where('master_trader_id', $masterId)
            ->where('status', 'active')
            ->get();

        $executedCount = 0;
        $skippedCount = 0;

        // 3. Process trade for each user (The Core Loop)
        foreach ($activeConnections as $connection) {
            $userId = $connection->user_id;
            $user = User::find($userId);

            if (!$user) {
                $skippedCount++;
                continue;
            }

            $riskConfig = UserRiskConfig::where('user_id', $userId)->first();

            $currentOpenPositions = TradeHistory::where('user_id', $userId)->where('status', 'open')->count();
            if ($riskConfig && $currentOpenPositions >= $riskConfig->max_open_positions) {
                $skippedCount++;
                continue;
            }

            preg_match('/([0-9.]+)/', $connection->multiplier, $matches);
            $multiplierValue = isset($matches[1]) ? (float) $matches[1] : 1.0;
            $followerLot = $masterLot * $multiplierValue;

            $requiredMargin = $followerLot * 1000;

            if ($user->balance < $requiredMargin) {
                $skippedCount++;
                continue;
            }

            // 5. Execute trade for the user
            $trade = TradeHistory::create([
                'user_id' => $userId,
                'master_trader_id' => $masterId,
                'symbol' => $symbol,
                'type' => strtoupper($type),
                'lot' => $followerLot,
                'entry_price' => $entryPrice,
                'status' => 'open',
                'opened_at' => Carbon::now(),
            ]);

            event(new TradeUpdated($userId, $trade, 'open'));

            // 6. Send Notification to Follower
            $tradeData = [
                'action' => 'open',
                'type' => strtoupper($type),
                'symbol' => $symbol,
                'lot' => $followerLot,
                'price' => $entryPrice,
                'net_profit' => 0
            ];
            $user->notify(new TradeExecutedNotification($tradeData));

            // Also send notification to Master Trader
            $masterNotificationData = [
                'action' => 'open',
                'type' => strtoupper($type),
                'symbol' => $symbol,
                'lot' => $masterLot,
                'price' => $entryPrice,
                'net_profit' => 0
            ];

            $masterUser = User::find($master->user_id);
            if ($masterUser) {
                $masterUser->notify(new TradeExecutedNotification($masterNotificationData));
            }

            $executedCount++;
        }

        return [
            'success' => true,
            'message' => "Trade executed for {$executedCount} followers. Skipped {$skippedCount} due to balance or risk limits."
        ];
    }

    public function closeTrade($masterId, $symbol, $closePrice, $masterNetProfit)
    {
        $master = MasterTrader::find($masterId);
        if (!$master) {
            return ['success' => false, 'message' => 'Master Trader not found!'];
        }

        $openTrades = TradeHistory::where('master_trader_id', $masterId)
            ->where('symbol', $symbol)
            ->where('status', 'open')
            ->get();

        $closedCount = 0;

        foreach ($openTrades as $trade) {
            $connection = CopyConnection::where('user_id', $trade->user_id)
                ->where('master_trader_id', $masterId)
                ->first();

            preg_match('/([0-9.]+)/', $connection->multiplier ?? '1', $matches);
            $multiplierValue = isset($matches[1]) ? (float) $matches[1] : 1.0;

            $followerNetProfit = $masterNetProfit * $multiplierValue;

            $trade->update([
                'status' => 'closed',
                'close_price' => $closePrice,
                'net_profit' => $followerNetProfit,
                'closed_at' => Carbon::now()
            ]);

            if ($connection) {
                $connection->increment('net_profit', $followerNetProfit);
            }

            $user = User::find($trade->user_id);
            if ($user) {
                $user->increment('balance', $followerNetProfit);
            }

            event(new TradeUpdated($trade->user_id, $trade, 'close'));

            $tradeData = [
                'action' => 'close',
                'type' => $trade->type,
                'symbol' => $symbol,
                'lot' => $trade->lot,
                'price' => $closePrice,
                'net_profit' => $followerNetProfit
            ];
            $user->notify(new TradeExecutedNotification($tradeData));

            $masterNotificationData = [
                'action' => 'close',
                'type' => 'SYSTEM',
                'symbol' => $symbol,
                'lot' => 0,
                'price' => $closePrice,
                'net_profit' => $masterNetProfit
            ];

            $masterUser = User::find($master->user_id);
            if ($masterUser) {
                $masterUser->notify(new TradeExecutedNotification($masterNotificationData));
            }

            $closedCount++;
        }

        return [
            'success' => true,
            'message' => "Trade closed successfully for {$closedCount} followers. Balances updated."
        ];
    }
}

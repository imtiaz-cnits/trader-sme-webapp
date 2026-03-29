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
            $user = User::find($userId); // 🌟 Fetch the user to check balance

            if (!$user) {
                $skippedCount++;
                continue;
            }

            $riskConfig = UserRiskConfig::where('user_id', $userId)->first();

            // Risk Check 1: Max Open Positions
            $currentOpenPositions = TradeHistory::where('user_id', $userId)->where('status', 'open')->count();
            if ($riskConfig && $currentOpenPositions >= $riskConfig->max_open_positions) {
                $skippedCount++;
                continue; // User has reached max open positions limit
            }

            // 4. Lot Size Calculation (Based on Multiplier)
            preg_match('/([0-9.]+)/', $connection->multiplier, $matches);
            $multiplierValue = isset($matches[1]) ? (float) $matches[1] : 1.0;
            $followerLot = $masterLot * $multiplierValue;

            // Risk Check 2: Required Margin (Simplified: $1000 margin per 1 lot)
            $requiredMargin = $followerLot * 1000;

            // 🌟 Balance Check 🌟
            if ($user->balance < $requiredMargin) {
                $skippedCount++;
                continue; // User does not have enough balance to cover the margin
            }

            // 5. Execute trade for the user (Save to database)
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

            // 6. Send Notification to User about the new trade
            $tradeData = [
                'action' => 'open',
                'type' => strtoupper($type),
                'symbol' => $symbol,
                'lot' => $followerLot,
                'price' => $entryPrice,
                'net_profit' => 0
            ];
            $user->notify(new TradeExecutedNotification($tradeData));

            // Also send notification to Master Trader about the new follower trade
            $masterNotificationData = [
                'action' => 'open',
                'type' => strtoupper($type),
                'symbol' => $symbol,
                'lot' => $masterLot,
                'price' => $entryPrice,
                'net_profit' => 0
            ];
            $masterUser = User::find($masterId);
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

        // Find all open trades for this master and symbol
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

            // 🌟 Update user's wallet balance 🌟
            $user = User::find($trade->user_id);
            if ($user) {
                // Profit adds to balance, Loss subtracts from balance
                $user->increment('balance', $followerNetProfit);
            }

            event(new TradeUpdated($trade->user_id, $trade, 'close'));

            // Send Notification to User about the closed trade
            $tradeData = [
                'action' => 'close',
                'type' => $trade->type,
                'symbol' => $symbol,
                'lot' => $trade->lot,
                'price' => $closePrice,
                'net_profit' => $followerNetProfit
            ];
            $user->notify(new TradeExecutedNotification($tradeData));

            // Also send notification to Master Trader about the closed follower trade
            $masterNotificationData = [
                'action' => 'close',
                'type' => 'SYSTEM',
                'symbol' => $symbol,
                'lot' => 0,
                'price' => $closePrice,
                'net_profit' => $masterNetProfit
            ];
            $masterUser = User::find($masterId);
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

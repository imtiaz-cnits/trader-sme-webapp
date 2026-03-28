<?php

namespace App\Services;

use App\Models\MasterTrader;
use App\Models\CopyConnection;
use App\Models\TradeHistory;
use App\Models\UserRiskConfig;
use Carbon\Carbon;
use App\Events\TradeUpdated;

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
            $riskConfig = UserRiskConfig::where('user_id', $userId)->first();

            // Risk Check 1: Max Open Positions
            $currentOpenPositions = TradeHistory::where('user_id', $userId)->where('status', 'open')->count();
            if ($riskConfig && $currentOpenPositions >= $riskConfig->max_open_positions) {
                $skippedCount++;
                continue; // User has reached max open positions limit
            }

            // 4. Lot Size Calculation (Based on Multiplier)
            // Example: "0.5x (Half Risk)" - Extract just the 0.5 value
            preg_match('/([0-9.]+)/', $connection->multiplier, $matches);
            $multiplierValue = isset($matches[1]) ? (float) $matches[1] : 1.0;

            $followerLot = $masterLot * $multiplierValue;

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

            $executedCount++;
        }

        return [
            'success' => true,
            'message' => "Trade executed for {$executedCount} followers. Skipped {$skippedCount} due to risk limits."
        ];
    }


    // ==========================================
    // Logic to close trades when Master Trader closes their trade
    // ==========================================
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

            event(new TradeUpdated($trade->user_id, $trade, 'close'));

            $closedCount++;
        }

        return [
            'success' => true,
            'message' => "Trade closed successfully for {$closedCount} followers."
        ];
    }
}

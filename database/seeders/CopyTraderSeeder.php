<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterTrader;
use App\Models\CopyConnection;
use App\Models\TradeHistory;
use App\Models\UserRiskConfig;
use App\Models\User;
use Carbon\Carbon;

class CopyTraderSeeder extends Seeder
{
    public function run()
    {
        $user = User::first() ?? User::factory()->create();

        // 1. Create Master Traders
        $masters = [
            ['name' => 'Alpha FX', 'avatar_bg_color' => '1d5053', 'monthly_roi' => 45.2, 'followers_count' => 1240, 'win_rate' => 88, 'risk_score' => 2, 'is_verified' => true, 'since_date' => '2024-01-10'],
            ['name' => 'Sniper X', 'avatar_bg_color' => '09090b', 'monthly_roi' => 112.5, 'followers_count' => 895, 'win_rate' => 71, 'risk_score' => 5, 'is_verified' => false, 'since_date' => '2024-08-15'],
            ['name' => 'Safe Trade', 'avatar_bg_color' => '3b82f6', 'monthly_roi' => 12.4, 'followers_count' => 3420, 'win_rate' => 94, 'risk_score' => 1, 'is_verified' => true, 'since_date' => '2025-03-01'],
        ];

        foreach ($masters as $master) {
            MasterTrader::create($master);
        }

        // 2. Create Active Connections for User
        CopyConnection::create(['user_id' => $user->id, 'master_trader_id' => 1, 'invested_amount' => 500, 'multiplier' => '1.0x (Proportional)', 'net_profit' => 85.50, 'status' => 'active', 'created_at' => Carbon::now()->subDays(10)]);
        CopyConnection::create(['user_id' => $user->id, 'master_trader_id' => 2, 'invested_amount' => 700, 'multiplier' => '0.5x (Half Risk)', 'net_profit' => -22.10, 'status' => 'paused', 'created_at' => Carbon::now()->subDays(14)]);

        // 3. Create Trade History (Open & Closed)
        // Open Trade
        TradeHistory::create(['user_id' => $user->id, 'master_trader_id' => 1, 'symbol' => 'GBPUSD', 'type' => 'BUY', 'lot' => 1.50, 'entry_price' => 1.26450, 'net_profit' => 195.00, 'status' => 'open']);
        // Closed Trade
        TradeHistory::create(['user_id' => $user->id, 'master_trader_id' => 2, 'symbol' => 'EURUSD', 'type' => 'SELL', 'lot' => 1.00, 'entry_price' => 1.05420, 'close_price' => 1.05600, 'net_profit' => -180.00, 'status' => 'closed', 'opened_at' => Carbon::now()->subDays(1), 'closed_at' => Carbon::now()]);

        // 4. Create Risk Config
        UserRiskConfig::create(['user_id' => $user->id]);
    }
}

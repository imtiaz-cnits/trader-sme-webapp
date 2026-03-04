<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\User;

class TradeLogSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        if (!$user) {
            $user = User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('password'),
            ]);
        }
        $userId = $user->id;

        // আগের ডামি ডাটা ক্লিয়ার করে দিচ্ছি যাতে ফ্রেশ ডাটা থাকে
        DB::table('trade_logs')->where('user_id', $userId)->delete();

        $trades = [];
        $sessions = ['Asian', 'London', 'New York', 'London/New York Overlap'];
        $instruments = ['EUR/USD', 'GBP/USD', 'USD/JPY', 'XAU/USD', 'BTC/USD'];
        $outcomes = ['Win', 'Loss', 'Breakeven'];

        // আজকে, গতকাল, গত সপ্তাহ এবং গত মাসের ডাটা মিক্স করে তৈরি করা হচ্ছে
        $dates = [
            Carbon::now(),
            Carbon::now(),
            Carbon::now(),
            Carbon::now(), // Today (4 trades)
            Carbon::now()->subDays(1),
            Carbon::now()->subDays(1),       // Yesterday (2 trades)
            Carbon::now()->subDays(3),
            Carbon::now()->subDays(5),       // This Week (2 trades)
            Carbon::now()->subDays(8),
            Carbon::now()->subDays(10),      // Last Week (2 trades)
            Carbon::now()->subDays(15),
            Carbon::now()->subDays(20),     // This Month (2 trades)
            Carbon::now()->subMonth()->subDays(2),
            Carbon::now()->subMonth()->subDays(5) // Last Month (2 trades)
        ];

        foreach ($dates as $index => $date) {
            $outcome = $outcomes[array_rand($outcomes)];

            if ($outcome === 'Win') {
                $gross = rand(200, 800);
                $net = $gross - rand(5, 20);
            } elseif ($outcome === 'Loss') {
                $gross = -rand(100, 400);
                $net = $gross - rand(5, 20);
            } else {
                $gross = rand(0, 10);
                $net = 0;
            }

            $trades[] = [
                'user_id' => $userId,
                'date_of_operation' => $date->format('Y-m-d'),
                'trading_session' => $sessions[array_rand($sessions)],
                'financial_instrument' => $instruments[array_rand($instruments)],
                'lot_size' => rand(1, 5) / 10,
                'position_type' => rand(0, 1) ? 'Buy' : 'Sell',
                'risk_benefit_metrics' => '1:' . rand(1, 3),
                'entry_time' => '09:00:00',
                'exit_time' => '11:30:00',
                'outcome' => $outcome,
                'gross_profit' => $gross,
                'commission_details' => rand(5, 20),
                'net_profit' => $net,
                'trade_image_link' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('trade_logs')->insert($trades);
        $this->command->info(count($trades) . ' Dynamic Dummy Trades Added Successfully!');
    }
}

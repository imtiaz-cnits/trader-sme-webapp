<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TradeExecutionService;

class SimulateTrade extends Command
{
    // Command signature with required arguments
    protected $signature = 'trade:simulate {master_id} {symbol} {type} {lot} {price}';

    protected $description = 'Simulate a master trade and broadcast it to active followers.';

    public function handle(TradeExecutionService $tradeService)
    {
        $masterId = $this->argument('master_id');
        $symbol = $this->argument('symbol');
        $type = $this->argument('type');
        $lot = (float) $this->argument('lot');
        $price = (float) $this->argument('price');

        $this->info("🚀 Receiving Signal from Master #{$masterId}...");
        $this->line("Symbol: {$symbol} | Type: {$type} | Lot: {$lot} | Price: {$price}");

        // Service class to execute the trade and handle the logic
        $result = $tradeService->executeTrade($masterId, $symbol, $type, $lot, $price);

        if ($result['success']) {
            $this->info("✅ " . $result['message']);
        } else {
            $this->error("❌ " . $result['message']);
        }
    }
}

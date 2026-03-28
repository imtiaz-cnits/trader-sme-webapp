<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TradeExecutionService;

class CloseTrade extends Command
{
    protected $signature = 'trade:close {master_id} {symbol} {close_price} {net_profit}';

    protected $description = 'Close an open master trade and calculate follower profits.';

    public function handle(TradeExecutionService $tradeService)
    {
        $masterId = $this->argument('master_id');
        $symbol = $this->argument('symbol');
        $closePrice = (float) $this->argument('close_price');
        $netProfit = (float) $this->argument('net_profit');

        $this->info("🔴 Receiving CLOSE Signal from Master #{$masterId}...");
        $this->line("Symbol: {$symbol} | Close Price: {$closePrice} | Master Profit: {$netProfit}");

        $result = $tradeService->closeTrade($masterId, $symbol, $closePrice, $netProfit);

        if ($result['success']) {
            $this->info("✅ " . $result['message']);
        } else {
            $this->error("❌ " . $result['message']);
        }
    }
}

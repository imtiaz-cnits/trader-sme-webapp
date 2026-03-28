<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\TradeExecutionService;

class ProcessTradeWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $masterId;
    protected $payload;

    public function __construct($masterId, $payload)
    {
        $this->masterId = $masterId;
        $this->payload = $payload;
    }

    public function handle(TradeExecutionService $tradeService)
    {
        $action = $this->payload['action'] ?? 'open';
        $symbol = $this->payload['symbol'];

        if ($action === 'open') {
            $tradeService->executeTrade(
                $this->masterId,
                $symbol,
                $this->payload['type'],
                $this->payload['lot'],
                $this->payload['price']
            );
        } elseif ($action === 'close') {
            $tradeService->closeTrade(
                $this->masterId,
                $symbol,
                $this->payload['close_price'],
                $this->payload['net_profit'] ?? 0
            );
        }
    }
}

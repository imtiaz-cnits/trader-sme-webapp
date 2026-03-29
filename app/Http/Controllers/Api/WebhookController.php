<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ProcessTradeWebhook;
use App\Models\MasterTrader;

class WebhookController extends Controller
{
    public function handleTrade(Request $request)
    {
        $master = $request->master_trader;

        \App\Jobs\ProcessTradeWebhook::dispatch($master->id, $request->all());

        return response()->json([
            'success' => true,
            'message' => 'Signal verified and queued.'
        ], 200);
    }
}

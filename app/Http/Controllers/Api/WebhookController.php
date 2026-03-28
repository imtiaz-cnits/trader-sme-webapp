<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MasterTrader;
use App\Jobs\ProcessTradeWebhook;

class WebhookController extends Controller
{
    public function handleSignal(Request $request)
    {
        // 1. Security Check: Verify the presence of the master_token in the request
        if (!$request->has('master_token')) {
            return response()->json(['error' => 'Unauthorized. Token missing.'], 401);
        }

        // 2. Match the token in the database
        $master = MasterTrader::where('webhook_token', $request->master_token)->first();

        if (!$master) {
            return response()->json(['error' => 'Invalid Master Token.'], 403);
        }

        // 3. Dispatch the job to the background (Queue) (so that TradingView doesn't have to wait)
        ProcessTradeWebhook::dispatch($master->id, $request->all());

        // 4. Send a 200 OK response to TradingView
        return response()->json([
            'success' => true,
            'message' => 'Signal received and queued for processing.'
        ], 200);
    }
}

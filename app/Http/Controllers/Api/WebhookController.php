<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\ProcessTradeWebhook;

class WebhookController extends Controller
{
    public function handleTrade(Request $request)
    {
        // 1. Security authentication & IP whitelisting are already handled by the VerifyWebhookSecurity Middleware.
        // The verified user is directly injected into the request object.
        $masterUser = $request->master_user;

        // 2. Dispatch the job to the background (Queue) so TradingView doesn't experience latency.
        // We pass the verified user's ID and the entire webhook payload.
        ProcessTradeWebhook::dispatch($masterUser->id, $request->all());

        // 3. Send an immediate 200 OK response to the client/TradingView.
        return response()->json([
            'success' => true,
            'message' => 'Signal verified securely and queued for processing.'
        ], 200);
    }
}

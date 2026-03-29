<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use App\Models\MasterTrader;

class VerifyWebhookSecurity
{
    // TradingView's Official IPs (https://www.tradingview.com/support/solutions/43000529348-i-want-to-know-more-about-webhooks/)
    private $allowedIps = [
        '52.89.214.238',
        '34.212.75.30',
        '54.218.53.128',
        '52.32.178.7',
        '127.0.0.1' // Localhost for testing purposes - remove in production
    ];

    public function handle(Request $request, Closure $next): Response
    {
        // 1. Check IP Address
        if (!in_array($request->ip(), $this->allowedIps)) {
            return response()->json(['error' => 'Unauthorized IP'], 403);
        }

        // 2. Check for Master Token in the Request
        $token = $request->input('master_token');
        if (!$token) {
            return response()->json(['error' => 'Master token is missing.'], 401);
        }

        // 3. Validate the Master Token
        $master = \App\Models\MasterTrader::where('webhook_token', $token)->first();

        if (!$master) {
            return response()->json(['error' => 'Invalid Master Token.'], 401);
        }

        // 4. Attach Master Trader to the Request for Controller Use
        $request->merge(['master_trader' => $master]);

        return $next($request);
    }
}

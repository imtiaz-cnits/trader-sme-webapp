<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

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
        // 1. IP Whitelisting Check
        if (!in_array($request->ip(), $this->allowedIps)) {
            return response()->json(['error' => 'Unauthorized IP Address. Access Denied.'], 403);
        }

        // 2. Token Check
        $token = $request->input('master_token');
        if (!$token) {
            return response()->json(['error' => 'Master token is missing.'], 401);
        }

        // 3. Find User by Token
        $masterUser = User::where('webhook_token', $token)->first();
        if (!$masterUser) {
            return response()->json(['error' => 'Invalid Master Token.'], 401);
        }

        // 4. Merge User Object with Request for Controller Access (so we can identify which user is sending the webhook)
        $request->merge(['master_user' => $masterUser]);

        return $next($request);
    }
}

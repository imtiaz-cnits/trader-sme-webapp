<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        // 1. Input validation
        $request->validate(['email' => 'required|email']);

        // 2. Attempt to send the password reset link
        $status = Password::broker()->sendResetLink(
            $request->only('email')
        );

        // 3. Return JSON response based on the status
        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['success' => true, 'message' => __($status)]);
        }

        return response()->json(['success' => false, 'message' => __($status)], 400);
    }
}

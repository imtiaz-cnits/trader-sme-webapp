<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid login credentials.'
            ], 401);
        }

        $request->session()->regenerate(); // Important for session security

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful!',
            'user' => Auth::user()
        ]);
    }

    public function showLoginForm()
    {
        return view('components.front-end.auth.registration-form'); // Update path to match your actual view file location
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['success' => true]);
    }
}

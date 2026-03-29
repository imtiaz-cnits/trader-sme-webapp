<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginValue = $request->input('email');
        $password = $request->input('password');
        $remember = $request->has('remember');

        if (empty($loginValue) || empty($password)) {
            return response()->json(['status' => 'error', 'message' => 'Please provide credentials.'], 400);
        }

        $fieldType = filter_var($loginValue, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $fieldType => $loginValue,
            'password' => $password
        ];

        if (!Auth::attempt($credentials, $remember)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid login credentials.'
            ], 401);
        }

        $request->session()->regenerate();

        return response()->json([
            'status' => 'success',
            'message' => 'Login successful!',
            'user' => Auth::user()
        ]);
    }

    public function showLoginForm()
    {
        return view('components.front-end.auth.registration-form', ['form' => 'login']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['success' => true]);
    }
}

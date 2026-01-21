<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Fetch logged-in user info
    public function show()
    {
        $user = Auth::user();
        return response()->json($user);
    }

    // Update profile info
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email'    => 'required|email|unique:users,email,' . Auth::id(),
            'bio'      => 'nullable|string|max:1000',
        
        ]);

        $user = Auth::user();

        $user->update([
            'username' => $request->username,
            'email'    => $request->email,
            'bio'      => $request->bio,
           
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'user'    => $user
        ]);
    }
}

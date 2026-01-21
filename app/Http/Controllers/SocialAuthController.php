<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    // Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
       $googleUser = Socialite::driver('google')->user();

        $user = User::updateOrCreate(
            ['provider' => 'google', 'provider_id' => $googleUser->getId()],
            ['name' => $googleUser->getName(), 'email' => $googleUser->getEmail()]
        );

        Auth::login($user);

        return redirect('/admin-dashboard');
    }

    // Facebook
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        $fbUser = Socialite::driver('facebook')->user();

        $user = User::updateOrCreate(
            ['provider' => 'facebook', 'provider_id' => $fbUser->getId()],
            ['name' => $fbUser->getName(), 'email' => $fbUser->getEmail()]
        );

        Auth::login($user);

        return redirect('/admin-dashboard');
    }
}

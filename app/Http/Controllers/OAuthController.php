<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class OAuthController extends Controller
{
    public function redirect(string $driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function callback($driver)
    {
        $user = Socialite::driver($driver)->user();

        $newUser = User::updateOrCreate([
            'email' => $user->getEmail()
        ],
        [
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'email_verified_at' => now(),
            'avatar' => $user->getAvatar(),
            'password' => Hash::make(Str::random(32)),
            'github_id' => $user->getId(),
            'github_token' => $user->token,
        ]);

        Auth::login($newUser, true);

        return redirect()->route('explore.index');
    }
}

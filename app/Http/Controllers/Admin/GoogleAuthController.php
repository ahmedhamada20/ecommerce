<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Throwable;
use App\Http\Controllers\Controller;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     */
    public function callback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Throwable $e) {
            return redirect('/')->with('error', 'Google authentication failed.');
        }

        $existingUser = User::where('type','customer')->where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::updateOrCreate([
                'email' => $user->email
            ], [
                'first_name' => $user->name,
                'last_name' => $user->name,
                'password' => bcrypt(Str::random(16)), // Set a random password
                'email_verified_at' => now(),
                'google_id' => $existingUser->id,
                'role' => 'customer',
                'type' => 'customer',
            ]);
            Auth::login($newUser);
        }

        return redirect('/dashboard');
    }
}

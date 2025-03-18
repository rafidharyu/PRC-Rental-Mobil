<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google OAuth page.
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle the callback from Google.
     */
    public function callbackGoogle()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::firstOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('defaultpassword'),
                    'role' => 'user',
                ]
            );

            Auth::login($user);

            if ($user->role === 'user') {
                return redirect()->route('index');
            } elseif (in_array($user->role, ['operator', 'owner'])) {
                return redirect()->route('panel.dashboard');
            } else {
                return redirect()->route('index')->with('error', 'Masuk dengan Google Gagal');
            }
        } catch (\Throwable $th) {
            return redirect()->route('index')->with('error', 'Masuk dengan Google Gagal');
        }
    }
}


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
            // Get the authenticated user from Google
            $googleUser = Socialite::driver('google')->user();

            // Find or create the user in the database
            $user = User::firstOrCreate(
                ['google_id' => $googleUser->getId()],
                [
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt('defaultpassword'), // Set a default password if necessary
                ]
            );

            // Login the user
            Auth::login($user);

            // Redirect to the dashboard
            return redirect()->route('panel.dashboard');
        } catch (\Throwable $th) {
            // Handle errors
            return redirect()->route('index')->with('error', 'Login with Google failed: ' . $th->getMessage());
        }
    }
}

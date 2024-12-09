<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Ensure user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user is an operator and inactive
            if ($user->role == 'operator' && !$user->is_active) {
                // Exclude the 'operator.inactive' route to prevent a redirect loop
                if ($request->route()->getName() !== 'operator.inactive') {
                    return redirect()->route('operator.inactive');  // Redirect to the inactive page
                }
            }
        }

        // Cek apakah pengguna adalah user
        if (Auth::check() && Auth::user()->role === 'user') {
            return redirect()->route('index'); // Arahkan pengguna ke halaman utama
        }

        return $next($request);
    }
}
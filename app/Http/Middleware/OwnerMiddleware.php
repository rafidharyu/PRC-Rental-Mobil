<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'owner') {
            return $next($request);
        }

        if (auth()->check() && auth()->user()->role === 'user') {
            return redirect()->route('index');
        }

        return redirect('/'); // Redirect jika bukan owner
    }
}

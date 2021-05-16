<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect()->back();
            }
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect()->back();
                // return redirect()->route('dashboard.home');
            }
            if ($guard == "user" && Auth::guard($guard)->check()) {
                return redirect()->back();
                // return redirect()->route('home');
            }
        }

        return $next($request);
    }
}

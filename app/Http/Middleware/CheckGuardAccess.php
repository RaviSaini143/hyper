<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckGuardAccess
{
    public function handle(Request $request, Closure $next, $guard, $redirectRoute)
    {
        if (!Auth::guard($guard)->check()) {
            return redirect()->route($redirectRoute);
        }

        return $next($request);
    }
}

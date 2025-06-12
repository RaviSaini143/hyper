<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedAddUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('add_user')->check()) {
            return redirect()->route('user.dashboard');
        } 
        
        if (Auth::guard('web')->check()) {
                if ($request->is('login') || $request->routeIs('login')) {
                  return redirect()->route('home');
                }
            }

        return $next($request);
    }
}

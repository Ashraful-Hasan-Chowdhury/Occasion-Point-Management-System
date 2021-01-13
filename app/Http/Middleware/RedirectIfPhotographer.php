<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfPhotographer
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'photographer')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('photographer.dashboard');
        }

        return $next($request);
    }

}

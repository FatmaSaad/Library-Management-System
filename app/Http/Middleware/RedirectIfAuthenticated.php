<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Bitfumes\Multiauth\Model\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // // dd($guard);
        // if($guard =="admin")
        // {
        //     // dd($guard);
        //     return redirect(RouteServiceProvider::HOME);
        // }
        if (Auth::guard($guard)->check()) {

            return redirect(RouteServiceProvider::HOME);
        }
        return $next($request);
    }
}

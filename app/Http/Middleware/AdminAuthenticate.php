<?php

namespace App\Http\Middleware;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;
class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if( Auth::user()->isAdmin() ){
                 return $next($request);
            }
            return redirect()->route('home');
        }

        return redirect()->route('login');
    }
}

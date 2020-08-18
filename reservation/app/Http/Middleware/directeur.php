<?php

namespace App\Http\Middleware;
use Redirect;
use Closure;
use Auth;
class directeur
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role=="directeur")
        {
            return $next($request);
        }
        else
        {
            return Redirect::back();
        }
    }
}

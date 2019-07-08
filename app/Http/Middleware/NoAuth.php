<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class NoAuth
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
        if(Session::get('user') != null)
        {
            return redirect('/master/acceuil');
        }
        return $next($request);
    }
}

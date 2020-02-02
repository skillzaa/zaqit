<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if(auth()->user()->role == 'admin'){
            return $next($request);
          }
            return redirect('/')->with('error','You have not admin access');
            //return "You are not Authorised";
    }
}

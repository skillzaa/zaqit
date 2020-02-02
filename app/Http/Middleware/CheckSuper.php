<?php

namespace App\Http\Middleware;

use Closure;

class CheckSuper
{
   
    public function handle($request, Closure $next)
    {
        if((auth()->user()->role == 'teacher') || (auth()->user()->role == 'supervisor')){
            return $next($request);
          }
            return redirect('/')->with('error','You have not access');
            //return "You are not Authorised";
    }
    }
}

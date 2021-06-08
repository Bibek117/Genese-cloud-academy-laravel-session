<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class AdminvendorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
           if(Auth::user()->user_type == 'admin' || Auth::user()->user_type == 'vendor'){
            return $next($request);
        }else{
             abort(403,'Sorry you cannot access the dashboard');
         }
        } else{
        abort(403, 'Unauthorized action.');
     }
   }
}

<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AdminMiddleware
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
        //return $next($request);
dd(Auth::user()->role_id);
        if(auth::check() && Auth::user()->role_id == 1){
            //return $next($request);
           //return redirect()->route('admin.dashboard');
         }
         else {
            //return redirect()->route('login');
         }
    }
}

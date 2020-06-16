<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        /** Admin Middleware **/
        if(auth()->user()->status == 1){
            return $next($request);
            return redirect()->to('/admin/home')->with('error',"You don't have the admin access.");
        }
        /** User Middleware **/
        else {
            return $next($request);
            return redirect()->to('/home')->with('error',"You are not a user.");
        }
    }
}

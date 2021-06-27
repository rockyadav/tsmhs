<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Response;

class StudentMiddleware
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
        if(!empty($request->user()))
        {
            if ($request->user() && $request->user()->role != '2')
            {
                return redirect('checklogin');
            }

            return $next($request);
        }else{
            return redirect('login')->with('error','Something went wrong!');
        }
    }
}

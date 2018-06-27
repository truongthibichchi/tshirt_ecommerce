<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


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
        if(Auth::check())
        {
            // if(Auth::user()->isAdmin==1)
            //     return $next($request);
            // // else return redirect('admin/login');
            // if(Auth::user()->isAdmin == 0)
            //     return redirect('admin/login')->with('message','You are not allowed to log in!');
                if(Auth::user())
                return $next($request);
                else return redirect('admin/login');
        }
        else
            return redirect('admin/login')->with('message','Please log in!'); 
    }
}

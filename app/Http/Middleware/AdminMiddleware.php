<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\DB;
use Closure;
use Illuminate\Support\Facades\Session;

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

        if (Session::has('door')) {
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}

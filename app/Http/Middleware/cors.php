<?php

namespace App\Http\Middleware;

use Closure;

class cors
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
        return $next($request);
          // ->header('Access-Controll-Allow-Origin', '*')
          // ->header('Access-Controll-Allow-Methods', 'Get, Post, Put, Delete, Options')
          // ->header('Access-Controll-Allow-Headers', 'Content-type, X-Auth-Token, Origin, Authorization, X-Requested-With');
    }
}

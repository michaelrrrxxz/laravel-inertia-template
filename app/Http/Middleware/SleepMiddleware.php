<?php

namespace App\Http\Middleware;

use Closure;

class SleepMiddleware
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
        sleep(1);
        return $next($request);
    }
}

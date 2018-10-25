<?php

namespace App\Http\Middleware;

use Closure;

class MaintenanceMiddleware
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

        // return $next($request);
        abort(500,'Sorry, we are doing some maintenance. Please check back soon. ');
    }
}

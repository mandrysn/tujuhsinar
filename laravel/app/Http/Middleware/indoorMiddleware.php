<?php

namespace App\Http\Middleware;

use Closure;

class indoorMiddleware
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
        $role = $request->user()->role;
        if ($role == 7 || $role == 1) {
            return $next($request);
        }else{
            return abort(403);
        }
    }
}

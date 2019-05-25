<?php

namespace App\Http\Middleware;

use Closure;

class orderMiddleware
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
        if ($role == 2 || $role == 1 || $role == 3) {
            return $next($request);
        }else{
            return abort(403);
        }
    }
}

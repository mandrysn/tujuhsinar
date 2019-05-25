<?php

namespace App\Http\Middleware;

use Closure;

class costumMiddleware
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
        if ($role == 10 || $role == 1) {
            return $next($request);
        }else{
            return abort(403);
        }
    }
}

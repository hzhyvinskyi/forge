<?php

namespace App\Http\Middleware;

use Closure;

class AccessMiddleware
{
    /**
     * @const Access toggle
     */
    const ACCESS = true;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!self::ACCESS) {
            abort(403);
        }
        return $next($request);
    }
}

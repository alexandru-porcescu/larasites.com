<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class YouShallNotPass
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
        if (!Auth::user()->is_admin) {
            abort(404);
        }

        return $next($request);
    }
}

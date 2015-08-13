<?php

namespace App\Http\Middleware;

use Closure;

class Robots
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
        if ($request->is('auth')) {
            return $next($request);
        }

        switch (app()->environment()) {
            case 'production':
                if ($request->is('robots.txt')) {
                    return response('User-Agent: *', 200)
                           ->header('Content-Type', 'text/plain');
                }
                break;
            default:
                if ($request->is('robots.txt')) {
                    return response("User-Agent: *\nDisallow: /", 200)
                           ->header('Content-Type', 'text/plain');
                }

                $response = $next($request);

                $response->header('X-Robots-Tag', 'noindex, nofollow, noarchive');

                return $response;
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class adminUsers extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    public function handle($request, Closure $next, ...$guards)
    {
        if (!$request->user()->authorizeRoles(['post_moderator'])) {
            abort(403);
        }

        return $next($request);
    }


}

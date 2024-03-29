<?php

namespace App\Http\Middleware;

use Closure;

class PostUsers
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
        if(!$request->user()->authorizeRoles(['theme_manager']))
        {
            abort(403);
        }
        return $next($request);
    }
}

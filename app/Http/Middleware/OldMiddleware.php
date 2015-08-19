<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class OldMiddleware
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
        if($request->input('admin') == false)
        return $next($request);
    }
}

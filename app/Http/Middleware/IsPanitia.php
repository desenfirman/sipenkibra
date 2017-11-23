<?php

namespace SIPENKIBRA\Http\Middleware;

use Closure;

class IsPanitia
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
        if (Auth::user() &&  Auth::user()->role == 0) {
            return $next($request);
        }
        return redirect('/');
    }
}

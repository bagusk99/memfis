<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class notLogin
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
		if (@Auth::check()) {
			return redirect()->route('dashboard.index');
		}
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class employee
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
		if (@Auth::user()->roles_id == 2 || !@Auth::check()) {
			return redirect()->route('/');
		}

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AuthenticateWithAdministrator
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
        if (Auth::admin()->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('admin/log-in');
            }
        }

        return $next($request);
    }
}

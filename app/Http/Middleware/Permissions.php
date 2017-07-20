<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Permissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
	 * @param  int  $minimumRole
     * @return mixed
     */
    public function handle($request, Closure $next, $minimumRole = 0)
    {
        $user = Auth::user();

		if($user->role < $minimumRole) {
			return redirect('/');
		}
		
		return $next($request);
    }
}

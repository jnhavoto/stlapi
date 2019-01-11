<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()) {

//            if (Auth::user()->teacher) {
//                return $next($request);
//            }
            if (Auth::user()['user_type'] == 2) {
//                return 'verified!';
                return $next($request);
            }

            Auth::logout();
            return redirect('/login');

        }

        return redirect('/login');
    }
}

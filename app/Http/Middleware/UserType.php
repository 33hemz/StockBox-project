<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if (auth()->user()->init_user) {
            return response()->redirectTo(route('first_time_login'));
        } else if (auth()->user()->user_type == $type) {
            return $next($request);
        }

        // if no access
        return response()->redirectTo(route('home'));
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(11111111111);
        // dd(auth()->user()->name);
        if((int) auth()->user()->role !== User::ROLE_ADMIN)
        {
            abort(404);
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (! $request->user()->hasRole($role)) {
            return redirect()->back()->with('error','Not Your Access');
        }

        return $next($request);
    }
}

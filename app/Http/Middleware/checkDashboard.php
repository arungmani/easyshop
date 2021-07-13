<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class checkDashboard
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
        $role = Auth::user()->role;
        if ($role == 4) {
            return redirect('home2');
        }
        return $next($request);
    }
}

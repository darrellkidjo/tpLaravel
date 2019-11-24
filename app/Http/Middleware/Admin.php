<?php

namespace App\Http\Middleware;

use Closure;

class Admin
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
        if (auth()->user()->is_admin == 1) {
             return $next($request);
        }
        else
        {
            return redirect('acceuil')->with('error', 'you don\'t have admin access');
        }
    }
}

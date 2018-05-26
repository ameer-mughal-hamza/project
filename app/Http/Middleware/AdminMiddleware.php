<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('doctor')->check() || Auth::guard('admin')->check() || Auth::guard('patient')->check()) {
            //we can also redirect the user where we want
            // retrun redirect('/');
            return $next($request);
        } else {
            return redirect('/admin/login');
        }
    }
}

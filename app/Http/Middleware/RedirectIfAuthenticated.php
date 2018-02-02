<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
//        if (Auth::guard($guard)->check()) {
//            return redirect('/admin');
//        }
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.dashboard');
                }
                break;
            case 'doctor':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('doctor.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check() == 'admin') {
                    return redirect('/admin/login');
                } else if(Auth::guard($guard)->check() == 'doctor') {
                    return redirect('/doctor/login');
                }
                break;
        }

        return $next($request);
    }
}

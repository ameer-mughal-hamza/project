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
            case 'patient':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('patient.dashboard');
                }
                break;
            case 'pharmacist':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('pharmacist.dashboard');
                }
                break;
            case 'labortarian':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('labortarian.dashboard');
                }
                break;
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect('/admin/login');
                } else if (Auth::guard($guard)->check() == 'doctor') {
                    return redirect('/doctor/login');
                }
                break;
        }

        return $next($request);
    }
}

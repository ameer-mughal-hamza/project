<?php

namespace App\Http\Controllers\DoctorAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:doctor');
    }

    public function showDoctorLoginForm()
    {
        return view('doctors.doctor-login-form');
    }

    public function doctorLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('doctor')->attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            return redirect()->intended(route('doctor.dashboard'));
        }
        return redirect()->back()->with('fail', 'Authentication failed!');
    }
}

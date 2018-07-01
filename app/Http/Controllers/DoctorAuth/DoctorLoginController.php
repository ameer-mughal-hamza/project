<?php

namespace App\Http\Controllers\DoctorAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class DoctorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:doctor', ['except' => ['logout']]);
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
            'password' => $request->password], $request->remeber)) {
            Alert::success('You are logged in successfully!', 'Congratulations')->persistent('Close');
            return redirect()->intended(route('doctor.dashboard'));
        }
        return redirect()->back()->with('fail', 'Authentication failed!');
    }

    public function logout(Request $request)
    {
        Auth::guard('doctor')->logout();
        return redirect('/doctor/login');
    }
}

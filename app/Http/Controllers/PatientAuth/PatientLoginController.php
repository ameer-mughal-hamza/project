<?php

namespace App\Http\Controllers\PatientAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class PatientLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:patient');
    }

    public function showPatientLoginForm()
    {
        return view('patients.patient-login-form');
    }

    public function patientLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('patient')->attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            Alert::success('You are logged in successfully!', 'Congratulations')->persistent('Close');
            return redirect()->intended(route('patient.dashboard'));
        }
        return redirect()->back()->with('fail', 'Authentication failed!');
    }
}

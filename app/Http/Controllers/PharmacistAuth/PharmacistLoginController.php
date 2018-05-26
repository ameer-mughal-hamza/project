<?php

namespace App\Http\Controllers\PharmacistAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class PharmacistLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pharmacist');
    }

    public function showPharmacistLoginForm()
    {
        return view('pharmacist.pharmacist-login-form');
    }

    public function pharmacistLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('pharmacist')->attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            Alert::success('You are logged in successfully!', 'Congratulations')->persistent('Close');
            return redirect()->intended(route('pharmacist.dashboard'));
        }
        return redirect()->back()->with('fail', 'Authentication failed!');
    }
}

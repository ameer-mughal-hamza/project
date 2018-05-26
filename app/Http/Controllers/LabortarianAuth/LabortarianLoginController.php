<?php

namespace App\Http\Controllers\LabortarianAuth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Alert;

class LabortarianLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:labortarian');
    }

    public function showLabortarianLoginForm()
    {
        return view('labortarian.labortarian-login-form');
    }

    public function labortarianLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('labortarian')->attempt([
            'email' => $request->email,
            'password' => $request->password])) {
            Alert::success('You are logged in successfully!', 'Congratulations')->persistent('Close');
            return redirect()->intended(route('labortarian.dashboard'));
        }
        return redirect()->back()->with('fail', 'Authentication failed!');
    }
}

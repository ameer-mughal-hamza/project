<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Alert;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showAdminLoginForm()
    {
        return view('admin.admin-login-form');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password])) {
            Alert::success('You are logged in successfully!', "Welcome to Admin Dashboard")->persistent('Close');
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->with('fail', 'Authentication failed!');
        }
    }
}
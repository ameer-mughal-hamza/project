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
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showAdminLoginForm()
    {
        return view('admin.admin-login-form');
    }

    public function adminLogin(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password], $request->remember)) {
            Alert::success('You are logged in successfully!', "Welcome to Admin Dashboard")->persistent('Close');
            return redirect()->intended(route('admin.dashboard'));
        } else {
            return redirect()->back()->with('fail', 'Authentication failed!');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
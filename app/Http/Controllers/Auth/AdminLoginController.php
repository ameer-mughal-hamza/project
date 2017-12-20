<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $this->validate($request,[
            'username' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (Auth::guard('admin')->attempt([
            'username' => $request->username,
            'password' => $request->password]))
        {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->with('fail','Authentication failed!');
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;
use Auth;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;

class AdminController extends Controller
{
    public function __construct()
    {
        //the statement below specify that i want to use
        //admin auth not default authentication
        //if i use auth only it will use the default web guard
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.admin-home');
    }

    public function changeAdminPassword(Request $request)
    {
        $admin = Admin::find($request->input('admin_id'))->first();
//        dd($admin);
        $password = $admin->password;
//        dd(Hash::check($request->input('old_password'), $password));
        if (Hash::check($request->input('old_password'), $password)) {
            $admin->password = Hash::make($request->input('password'));
            $admin->save();
            if ($admin->save()) {
                Alert::success('Password Changed Successfully!', "Password Changed")->persistent('Close');
                return redirect()->route('admin.dashboard');
            }
        }
        Alert::success('Password not changed!', "Password Not Changed :(")->persistent('Close');
        return redirect()->route('admin.dashboard');
    }


    public function showSettings()
    {
        return view('admin.settings');
    }

}
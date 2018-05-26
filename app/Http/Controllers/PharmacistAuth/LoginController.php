<?php

namespace App\Http\Controllers\DoctorAuthAuth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function credentials(Request $request)
    {
//        $credentials = $request->only($this->username(), 'password');
//        return array_add($credentials, 'deleted_flag', '0');
//        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'deleted_flag', '1'];
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'deleted_flag', '1'];
    }
}

@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/login-form.css') }}">--}}
    <link rel="icon" type="image/png" href="{{ URL::to('login-page-css/images/icons/favicon.ico') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('login-page-css/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('login-page-css/iconic/css/material-design-iconic-font.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('login-page-vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('login-page-vendor/css-hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('login-page-vendor/animsition/css/animsition.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('login-page-vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('login-page-vendor/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('login-page-css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('login-page-css/main.css') }}">
@endsection
@section('content')

    <div class="limiter">
        <div class="container-login100" style="background-image: url('/login-page-css/images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form method="post" action="{{ route('doctor.login.submit') }}" class="login100-form validate-form">
					<span class="login100-form-title p-b-49">
						DOCTOR LOGIN
					</span>
                    {{ csrf_field() }}

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Username</span>
                        <input class="input100 {{ $errors->has('username') ? 'has-error' : '' }}" type="text"
                               name="email" placeholder="Type your username">
                        @if($errors->has('username'))
                            {{--<span class="help-block"--}}
                            {{--style="font-size: 12px; color: red;">{{ $errors->first('username') }}</span>--}}
                            <span class="focus-input100" data-symbol="&#xf206;">{{ $errors->first('username') }}</span>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100 {{ $errors->has('password') ? 'has-error' : '' }}" type="password"
                               name="password" placeholder="Type your password">
                        @if($errors->has('password'))
                            {{--<span class="help-block"--}}
                            {{--style="font-size: 12px; color: red;">{{ $errors->first('password') }}</span>--}}
                            <span class="focus-input100 help-block"
                                  data-symbol="&#xf190;">{{ $errors->first('password') }}</span>
                        @endif
                    </div>

                    <div class="text-right p-t-8 p-b-31 pull-left">
                        <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember">
                        <span class="label-input100">Remember me</span>
                    </div>


                    <div class="text-right p-t-8 p-b-31">
                        <a href="{{route('doctor.password.request')}}">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{--<div class="loginBox">--}}
    {{--<img src="{{ asset('images/Icon-user.png') }}" class="user">--}}
    {{--<h2>Login Form</h2>--}}
    {{--@if(Session::has('fail'))--}}
    {{--<div class="alert alert-danger">--}}
    {{--{{ Session::get('fail') }}--}}
    {{--</div>--}}
    {{--@endif--}}
    {{--<form method="post" action="{{ route('doctor.login.submit') }}">--}}
    {{--{{ csrf_field() }}--}}
    {{--<p>Email</p>--}}
    {{--<input type="text" name="email" placeholder="Enter user name" value="{{ old('email') }}">--}}
    {{--<p>Password</p>--}}
    {{--<input type="password" name="password" placeholder="Enter your password">--}}
    {{--<input type="submit" name="" value="Sign In">--}}
    {{--</form>--}}
    {{--</div>--}}

@endsection
@section('scripts')4
{{--    <script src="{{ URL::to('login-page-js/vendor/jquery/jquery-3.2.1.min.js') }}"></script>--}}
<!--===============================================================================================-->
<script src="{{ URL::to('login-pagr-vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ URL::to('login-page-vendor/bootstrap/js/popper.js') }}"></script>
<script src="{{ URL::to('login-page-vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ URL::to('login-page-vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ URL::to('login-page-vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::to('login-page-vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ URL::to('login-page-vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ URL::to('login-page-js/main.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
@endsection
@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/login-form.css') }}">
@endsection
@section('content')
    <div class="loginBox">
        <img src="{{ asset('images/Icon-user.png') }}" class="user">
        <h2>Login Form</h2>
        @if(Session::has('fail'))
            <div class="alert alert-danger">
                {{ Session::get('fail') }}
            </div>
        @endif
        <form method="post" action="{{ route('admin.login.submit') }}">
            {{ csrf_field() }}
            <p>Email</p>
            <input type="text" name="username" placeholder="Enter user name" value="{{ old('username') }}" required class="{{ $errors->has('username') ? 'has-error' : '' }}">
            @if($errors->has('username'))
                <span class="help-block" style="font-size: 12px; color: red;">{{ $errors->first('username') }}</span>
            @endif
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter your password" required class="{{ $errors->has('password') ? 'has-error' : '' }}">
            @if($errors->has('password'))
                <span class ="help-block" style="font-size: 12px; color: red;">{{ $errors->first('password') }}</span>
            @endif
            <input type="submit" name="" value="Sign In">
        </form>
    </div>
@endsection
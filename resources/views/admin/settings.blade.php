@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}"
          xmlns:Auth="http://www.w3.org/1999/xhtml">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('admin.admin-partials.admin-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="dashboard-con">
                    <div class="col-md-6 col-md-offset-3 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Change Password</h5>
                            </header>

                            <form action="{{ route('admin.change.password') }}"
                                  method="POST"
                                  style="margin-bottom: 40px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group {{ $errors->has('old_password') ? 'has-error' : '' }}">
                                            <label for="old_password" class="control-label">Old Password</label>
                                            <input type="password" class="form-control" name="old_password"
                                                   id="old_password" autocomplete="off"
                                                   placeholder="Old Password" value="">
                                            @if($errors->has('old_password'))
                                                <span class="help-block"></span>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{Auth::user()->id}}" name="admin_id">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="password" class="control-label">New Password</label>
                                            <input type="password" class="form-control" name="password" autocomplete="off"
                                                   id="password"
                                                   placeholder="Password" value="">
                                            @if($errors->has('password'))
                                                <span class="help-block"></span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="confirm_password" class="control-label">Confirm
                                                Password</label>
                                            <label class="sr-only">Confirm Password</label>
                                            <input type="password" class="form-control" name="confirm_password"
                                                   id="confirm_password" autocomplete="false"
                                                   placeholder="Confirm Password" value="">
                                            @if($errors->has('confirm_password'))
                                                <span class="help-block"></span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <input type="text" hidden value="{{ Auth::user()->id }}" name="id" id="id">
                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Change Password"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <footer id="admin-footer" class="clearfix">
                        <div class="pull-left"><b>Copyright </b>&copy; 2017</div>
                        <div class="pull-right">admin system</div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection


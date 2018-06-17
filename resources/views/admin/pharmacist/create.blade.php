@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('chosen_v1.4.0/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('summernote-master/dist/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/new-article.css') }}">
@endsection
@endsection
@section('content')

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('admin.admin-partials.admin-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="content" class="col-md-8" style="margin-left: 180px;">
                    <header>
                        <h2 class="page_title">Create new Doctor</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{ route('pharmacist.store') }}" method="POST">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                   placeholder="Email" value="{{ old('email') }}">
                                            @if($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <label class="control-label">Password</label>
                                            <input type="text" class="form-control" name="password" id="password"
                                                   placeholder="Password" value="{{ old('password') }}">
                                            @if($errors->has('password'))
                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Save">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <footer id="admin-footer" class="clearfix">
                        <div class="pull-left"><b>Copyright </b>&copy; 2015</div>
                        <div class="pull-right">admin system</div>
                    </footer>
                </div>
            </div>
        </div>
    </div>

    {{--All scripts of this page will include in the master layout structure and then display--}}
@section('scripts')
    <script src="{{URL::to('chosen_v1.4.0/chosen.jquery.min.js') }}"></script>
    <script src="{{URL::to('summernote-master/dist/summernote.min.js') }}"></script>
@endsection
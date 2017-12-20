@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/doctor-info.css') }}">
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
                    <div class="row">
                        <div class="col-md-12 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Doctors</h5>
                                </header>
                                <img src="{{ asset('doctor-images/' . $doctor->image_url) }}" height="150" width="150" class="dr-img">
                                <div class="col-md-10 clearfix doc-profile">
                                    <h4 class="doc-profile-name">Dr. {{ $doctor->first_name .' '.$doctor->last_name }}</h4>
                                    @foreach($doctor->categories as $category)
                                        <h5 class="doc-sepecializaton">{{ $category->name }}</h5>
                                    @endforeach
                                    <br>
                                    @foreach($doctor->degrees as $degree)
                                        <h5 class="doc-complete-edu">{{ $degree->name }}</h5>
                                    @endforeach
                                    <br>
                                    {{--<h6>{{ $doctor->category }}</h6>--}}
                                    <h5 class="verified">PMDC Verified</h5>
                                </div>
                                <hr>
                            </div>
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
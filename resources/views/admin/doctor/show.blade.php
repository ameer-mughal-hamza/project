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
                                <div class="single-blog-area">
                                    <div class="row" style="margin-bottom: 30px;">
                                        <div class="col-md-8">
                                            <div class="col-md-4">
                                                <div style="border-radius: 50%;">
                                                    <img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"
                                                         style=" height:200px; width: 200px; border-radius: 50%;">
                                                </div>
                                            </div>
                                            <div class="doctor-professional-profile col-md-8">
                                                <h4 class="doc-profile-name">Dr. {{ $doctor->first_name }}</h4>
                                                <h5 class="doc-complete-edu">{{ $doctor->education }}</h5>
                                                <h6 class="doc-specialization">{{ $doctor->category }}</h6>
                                                @if($doctor->pmdc_verified == 0)
                                                    <h5 class="verified">
                                                        <i class="fa fa-check-square-o"></i> PMDC Verified</h5>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
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
@extends('doctors.doctor-layouts.doctor-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
        @include('doctors.doctor-partials.doctor-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('doctors.doctor-partials.doctor-header')
                <div id="dashboard-con">
                    <div class="row">
                        <div class="col-md-6 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Appointment Details</h5>
                                    <a href="{{ route('doctor.blog.posts',['id' => Auth::user()->id]) }}"
                                       class="pull-right btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                </header>
                                <div class="pull-left">
                                    <img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"
                                         style="height:180px; width: 180px; border-radius: 50%;"
                                         class="search-doc-dp">
                                </div>
                                <div style="position: absolute; margin-left: 205px;">
                                    <h4>{{$patient->patient_name}}</h4>
                                    <h6>{{$patient->email}}</h6>
                                    <h6>{{$patient->patient_mobile}}</h6>
                                    <h6>Booked Date : {{$appointment->booked_date}}</h6>
                                    <h6>Booked Time : {{$appointment->booked_time}}</h6>
                                    <h6>Reason : {{$appointment->reason}}</h6>
                                </div>
                                <div class="clearfix"></div>
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
    </div>
@endsection
{{--All scripts of this page will include in the master layout structure and then display--}}
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{URL::to('custom-js/add-time-row.js') }}"></script>
@endsection
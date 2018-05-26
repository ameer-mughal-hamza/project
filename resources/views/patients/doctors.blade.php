@extends('patients.patient-layouts.patient-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('main-web-css/doctor-view.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
        @include('patients.patient-partials.patient-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('patients.patient-partials.patient-header')
                <div id="dashboard-con">
                    <div class="row">
                        {{--Medicine prescription goes gere--}}
                        <div class="col-md-12">
                            <div class="admin-content-con clearfix" id="prescription">
                                <header class="clearfix">
                                    <h5 style="float: left;">Doctors</h5>
                                </header>
                                <div class="similar-doctor-list">
                                    <div class="row">
                                        @foreach($doctors as $doctor)
                                            <div class="col-md-3">
                                                <div class="similar-doctor-data">
                                                    <div style="text-align: center;">
                                                        <img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"
                                                             style="height:160px; width: 160px; border-radius: 50%;"
                                                             class="search-doc-dp">
                                                    </div>
                                                    <h2>{{ $doctor->first_name }}</h2>
                                                    <h4>{{ $doctor->education }}</h4>
                                                    <h3>{{ $doctor->category }}</h3>
                                                    <a href="{{ route('show.patient.doctor.info', $doctor->id) }}"
                                                       class="btn btn-success">View Profile</a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
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
    </div>
@endsection
{{--All scripts of this page will include in the master layout structure and then display--}}
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
@endsection
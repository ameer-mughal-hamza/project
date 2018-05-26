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
                        <div class="col-md-12">
                            <div class="admin-content-con clearfix" id="prescription">
                                <header class="clearfix">
                                    <h5 style="float: left;">Doctors</h5>
                                </header>
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
                                <div class="col-md-4 doc-info-card">
                                    <div class="profile-info-item">
                                        <p><a href=""><i class="fa fa-heart"></i></a><span
                                                    class="lbl-info"> Favourite</span></p>
                                    </div>
                                    <div class="profile-info-item">
                                        <p><a href=""><i class="fa fa-thumbs-up"></i></a><span
                                                    style="font-size: 22px; font-weight: 700;"> 3</span><span
                                                    class="lbl-info"> Recommendations</span>
                                        </p>
                                    </div>
                                    <div class="profile-info-item">
                                        <p><a href=""><i class="fa fa-star-o"></i></a><span> 21</span><span
                                                    class="lbl-info"> Years of Experience</span>
                                        </p>
                                    </div>
                                    <div class="profile-info-item">
                                        <p><a href=""><i class="fa fa-binoculars"></i></a><span> 636</span><span
                                                    class="lbl-info"> Profile Views</span>
                                        </p>
                                    </div>
                                    <div class="profile-info-item">
                                        <p><a href=""><i class="fa fa-money"></i></a><span
                                                    class="lbl-info"> Fee: {{ $doctor->fee }}</span>
                                        </p>
                                    </div>
                                    <div class="profile-info-item">
                                        <p><a href=""><i class="fa fa-star-half-o"></i></a><span class="lbl-info"> Reviews</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div style="margin-bottom: 15px;/*margin-top: -48px;*/">
                                        <a href="{{ route('appointment', ['id' => $doctor->id]) }}"
                                           class="profile-buttons btn">BOOK APPOINTMENT</a>
                                        <a href="" class="profile-buttons btn">BOOK APPOINTMENT</a>
                                        <a href="" class="profile-buttons btn">BOOK APPOINTMENT</a>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-about col-md-12">
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <h2>
                                            <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>
                                            <span class="section-title">About Dr. {{ $doctor->first_name }}</span>
                                        </h2>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <p>
                                            {{ $doctor->description }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-9">
                                <div class="profile-education">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> Eduacation</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="defaultShowEducation">
                                                <ul>
                                                    {{--@foreach($doctorsEducation as $edu)--}}
                                                    {{--<li>--}}
                                                    {{--<span>{{ $edu }}</span>--}}
                                                    {{--<br>--}}
                                                    {{--</li>--}}
                                                    {{--@endforeach--}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="profile-specialization">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h2><i class="fa fa-star-half-full"></i> Specialization</h2>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="defaultShowSpec">
                                                <ul>
                                                    <li>
                                                        <span>BDC</span>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <span>BDC</span>
                                                        <br>
                                                    </li>
                                                    <li>
                                                        <span>BDC</span>
                                                        <br>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--<div class="row">--}}
                        {{--<footer id="admin-footer" class="clearfix">--}}
                        {{--<div class="pull-left"><b>Copyright </b>&copy; 2017</div>--}}
                        {{--<div class="pull-right">admin system</div>--}}
                        {{--</footer>--}}
                        {{--</div>--}}
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
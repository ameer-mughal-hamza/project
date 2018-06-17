@extends('patients.patient-layouts.patient-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/appointment-form.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ URL::to('main-web-css/doctor-view.css') }}">--}}
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('patients.patient-partials.patient-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('patients.patient-partials.patient-header')
                <div id="dashboard-con">
                    <div class="col-md-4 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header class="clearfix">
                                <h5 class="pull-left">Doctor Detail</h5>
                            </header>
                            <div style="text-align: center;">
                                <img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"
                                     style="height:180px; width: 180px; border-radius: 50%;"
                                     class="search-doc-dp">
                            </div>
                            <div style="text-align:center; margin-top: 25px;">
                                <h4>Ameer Hamza</h4>
                                <h6>03216417307</h6>
                                <h6></h6>
                                <h6></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <form id="msform">
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active" id="date">Date</li>
                                <li id="time">Time</li>
                                <li>Details</li>
                            </ul>
                            <!-- fieldsets -->
                            <fieldset>
                                <h2 class="fs-title">Select the date of appointment</h2>
                                <div class="calendar" id="datepicker">
                                </div>
                            </fieldset>
                            <fieldset class="time_wizard">
                                <h2 class="fs-title">Available time</h2>
                                <h3 class="fs-subtitle">Select any of the time available</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="appul">
                                            <ul>
                                                <li id="available_times">
                                                    <span name="selected_time[]"></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <input type="button" name="previous" class="previous action-button" value="Previous"/>
                                {{--<input type="button" name="next" class="next action-button" value="Next"/>--}}
                            </fieldset>
                            <fieldset>
                                <h2 class="fs-title">Personal Details</h2>
                                <h3 class="fs-subtitle">We will never sell it</h3>
                                <input type="text" id="reason" name="reason" placeholder="Reason"/>
                                <input type="hidden" id="patient_id" name="patient_id" value="{{ Auth::user()->id }}"/>
                                <input type="hidden" id="doctor_id" name="doctor_id" value="{{ $doctor[0]->id }}"/>
                                <input type="button" name="previous" class="previous action-button" value="Previous"/>
                                <input type="submit" id="submit_form" class="submit action-button" value="Save"/>
                            </fieldset>
                        </form>
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
@endsection
{{--All scripts of this page will include in the master layout structure and then display--}}
@section('scripts')
    <script src="{{ URL::to('custom-js/appointment-form.js') }}"></script>
@endsection
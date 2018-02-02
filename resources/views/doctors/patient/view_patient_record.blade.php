@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
@endsection
@section('content')

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @if(Auth::guard('admin')->check())
            @include('admin.admin-partials.admin-navbar')
        @else
            @include('doctors.doctor-partials.doctor-navbar')
        @endif
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('doctors.doctor-partials.doctor-header')
                <div id="dashboard-con">
                    <div class="row">
                        <div class="col-md-4 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Patient Information</h5>
                                </header>
                                <div class="content">
                                    <form action="{{ route('add_patient') }}" id="save_patient" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" id="patient_name" class="form-control input-sm"
                                                           required
                                                           placeholder="Name"
                                                           value="{{ $patient->patient_name }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mobile No.</label>
                                                    <input type="text" id="patient_mobile" class="form-control input-sm"
                                                           required
                                                           placeholder="Mobile Number"
                                                           value="{{ $patient->patient_mobile }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit"
                                                       class="btn btn-primary pull-left btn-sm" value="Update">
                                            </div>
                                        </div>
                                        <input type="text" class="hidden" id="doctor_id" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Prescriptions</h5>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $medicines as $medicine)
                                        <tr>
                                            <td>{{ date('M j, Y', strtotime($medicine->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{ route('view_report',['id'=>$medicine->id]) }}"
                                                   role="button">view
                                                    prescription</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{URL::to('js/bootstrap.js/bootstrap.min.js') }}"></script>
@endsection
@endsection
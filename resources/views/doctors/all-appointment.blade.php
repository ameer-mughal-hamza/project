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
                        <div class="col-md-12 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Appointments</h5>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Reason</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $appointments as $appointment)
                                        <tr>
                                            <td>{{ $appointment->reason }}</td>
                                            {{--<td>{!! substr($post->content,0 , 50) !!}{{ strlen($post->content) > 50 ? "...":"" }}</td>--}}
                                            <td>{{ date('M j, Y', strtotime($appointment->booked_date)) }}</td>
                                            <td>{{ $appointment->booked_time }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('appointment-detail',['id' => $appointment->patient_id,'appointment_id'=>$appointment->id]) }}"
                                                   role="button">view</a>
                                                <a class="btn btn-xs btn-danger"
                                                   href="{{ route('appointment-delete',['id' => $appointment->id]) }}"
                                                   role="button">del</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <a href="{{ route('doctor.blog.posts',['id' => Auth::user()->id]) }}"
                                       class="pull-right text-link">view all
                                        articles</a>
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
    </div>
@endsection
{{--All scripts of this page will include in the master layout structure and then display--}}
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="{{URL::to('custom-js/add-time-row.js') }}"></script>
    <div class="modal fade" id="view-appointment" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Modal title</h4>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
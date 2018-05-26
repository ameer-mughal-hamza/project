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
                        {{--Patient Information goes gere--}}

                        {{--Medicine prescription goes gere--}}
                        <div class="col-md-4">
                            <div class="admin-content-con clearfix" id="prescription">
                                <header class="clearfix">
                                    <h5 style="float: left;">Prescription</h5>
                                    <i class="fa fa-repeat pull-right" id="reset-form" role="button"></i>
                                </header>
                                <table id="medicine_prescription" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Timings</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="medicine_row">
                                    <tr>
                                        <td>
                                            <input type="text" name="timings[]" id="timings"
                                                   required
                                                   data-srno="1"
                                                   class="form-control number_only timings input-sm"
                                                   placeholder="Time"/></td>
                                        <td>
                                            <button type="button" name="add_row" id="add_row"
                                                    class="btn btn-success btn-sm">
                                                Add Row
                                            </button>
                                            <input type="hidden" name="doctor_id" id="doctor_id"
                                                   value="{{ Auth::user()->id }}">
                                        </td>
                                    </tr>
                                    </tbody>
                                    <tr>
                                        <td>
                                            <button type="submit" id="insert" class="btn btn-primary btn-sm">Insert
                                            </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="admin-content-con clearfix" id="prescription">
                                <header class="clearfix">
                                    <h5 style="float: left;">Prescription</h5>
                                </header>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="defaultShowEducation">
                                            <ul>
                                                @foreach($timings as $time)
                                                    <li>
                                                        <span id="selected_time">{{ $time }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
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
    <script type="text/javascript">
        $('#insert').click(function () {
            var timings = $("input[name = 'timings\\[\\]']").map(function () {
                return $(this).val();
            }).get().join("||||");

            var doctor_id = $('#doctor_id').val();

            alert(doctor_id);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/appointment_store',
                dataType: 'JSON',
                data: {
                    doctor_id: doctor_id,
                    timings: timings,
                },
                success: function (msg) {
                    console.log(msg);
                },
                failure: function (msg) {
                    console.log(msg);
                }
            });

        });
    </script>
@endsection
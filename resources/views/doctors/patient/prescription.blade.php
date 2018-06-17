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
                        <div class="col-md-4">
                            <div class="admin-content-con" id="patient_info_form">
                                <header class="clearfix">
                                    <h5 class="pull-left">Patient Information</h5>
                                </header>
                                <div class="content">
                                    <form action="{{ route('add_patient') }}" id="save_patient" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group {{ $errors->has('patient_email') ? 'has-error' : '' }}">
                                                    <label>Email</label>
                                                    <input type="text" name="patient_email" id="patient_email"
                                                           class="form-control input-sm"
                                                           placeholder="Email"
                                                           value="">
                                                    @if($errors->has('patient_email'))
                                                        <span class="help-block">{{ $errors->first('patient_email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group {{ $errors->has('patient_name') ? 'has-error' : ''}}">
                                                    <label>Name</label>
                                                    <input type="text" name="patient_name" id="patient_name"
                                                           class="form-control input-sm"
                                                           placeholder="Name"
                                                           value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group {{ $errors->has('patient_mobile') ? 'has-error' : '' }}">
                                                    <label>Mobile No.</label>
                                                    <input type="text" name="patient_mobile" id="patient_mobile"
                                                           class="form-control input-sm"
                                                           placeholder="Mobile Number" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit"
                                                       class="btn btn-primary pull-left btn-sm" value="Save">
                                            </div>
                                        </div>
                                        <input type="text" class="hidden" id="doctor_id"
                                               value="{{ Auth::guard('doctor')->user()->id }}">
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--Medicine prescription goes gere--}}
                        <div class="col-md-8">
                            <div class="admin-content-con clearfix" id="prescription">
                                <header class="clearfix">
                                    <h5 style="float: left;">Prescription</h5>
                                    {{--<button class="btn btn-danger btn-sm" id="reset-form">Reset</button>--}}
                                    <i class="fa fa-repeat pull-right" id="reset-form" role="button"></i>
                                    {{--<img src="/images/reset-icon.png" alt="" height="22px"--}}
                                    {{--width="22px" class="pull-right" id="reset-form">--}}
                                </header>
                                <table id="medicine_prescription" class="table table-striped">
                                    <textarea name="history" id="history" cols="30" rows="10" class="form-control"
                                              placeholder="Enter Patient History"></textarea>
                                    <thead>
                                    <tr>
                                        <th>Age</th>
                                        <th>Weight</th>
                                        <th>Blood Pressure</th>
                                        <th>Temprature</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input type="text" id="age"
                                                   class="form-control input-sm" required
                                                   placeholder="Age"
                                                   value=""></td>
                                        <td><input type="text" id="weight"
                                                   class="form-control input-sm" required
                                                   placeholder="Weight"
                                                   value=""></td>
                                        <td><input type="text" id="bloodpressure"
                                                   class="form-control input-sm" required
                                                   placeholder="Blood Pressure"
                                                   value=""></td>
                                        <td><input type="text" id="temprature"
                                                   class="form-control input-sm" required
                                                   placeholder="Temprature"
                                                   value=""></td>
                                        <input type="text" id="patient_id" class="hidden">
                                    </tr>
                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Medicine Type</th>
                                        <th>Medicine Name</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="medicine_row">
                                    <tr>
                                        <td>
                                            <select class="form-control input-sm" id="medicine_type"
                                                    name="medicine_type[]">
                                                <option value="Syrup">Syrup</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Capsule">Capsule</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="medicine_name[]" id="medicine_name" required
                                                   placeholder="Enter medicine name"
                                                   data-srno="1" class="form-control input-sm medicine_name"
                                                   autocomplete="off"/></td>
                                        <td>
                                            <input type="text" name="medicine_quantity[]" id="medicine_quantity"
                                                   required
                                                   data-srno="1"
                                                   class="form-control number_only medicine_quantity input-sm"
                                                   placeholder="Medicine quantity"/></td>
                                        <td>
                                            <button type="button" name="add_row" id="add_row"
                                                    class="btn btn-success btn-sm">
                                                Add Row
                                            </button>
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
    <script src="{{URL::to('custom-js/add-row.js') }}"></script>

    <script>
        $(function () {
            if (sessionStorage.getItem("patient_id") === null) {
                $("#prescription").hide();
            }
            else {
                $("#prescription").show();
                $("#save_patient :input").prop("disabled", true);
                $("#patient_id").val(sessionStorage.getItem("patient_id"));
                $("#patient_name").val(sessionStorage.getItem("patient_name"));
                $("#patient_mobile").val(sessionStorage.getItem("patient_mobile"));
            }
        });
    </script>

    {{--reset form--}}

    <script type="text/javascript">
        $('#reset-form').click(function () {
            sessionStorage.clear();
            window.location = 'http://localhost:8000/doctor/medicine/prescription';
        });
    </script>

    {{--Medicine Name and Lab Test Name Autocomplete--}}

    <script>
        $(function () {
            $("#medicine_name").autocomplete({
                source: 'http://localhost:8000/search'
            });
        });
    </script>


    {{--Save Patient Information--}}
    <script type="text/javascript">
        $('#save_patient').on('submit', function (e) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var patient_id;
            var email = $('#patient_email').val();
            var name = $('#patient_name').val();
            var mobile = $('#patient_mobile').val();
            var doctor_id = $('#doctor_id').val();


            e.preventDefault(e);

            $.ajax({
                type: 'POST',
                url: '/add_patient',
                dataType: 'JSON',
                data: {
                    email: email,
                    name: name,
                    mobile: mobile,
                    doctor_id: doctor_id
                },
                success: function (data) {
                    if (data.id === "") {
                        alert('Record is not saved');
                    } else {
                        console.log(data);
                        sessionStorage.setItem("patient_id", data['id']); // Get id of currently saved patient
                        $("#prescription").show();
                        $("#patient_id").val(data['id']); // Get id of currently Added user
                        disablePatientInformationForm();  // Disable User Information form
                    }
                },
                error: function (data) {
                    console.log(data.responseJSON['email']);
                }
            });

            function disablePatientInformationForm() {
                $("#save_patient :input").prop("disabled", true);
            }
        });
    </script>

    {{--Insert Medicine Prescription in database--}}
    <script type="text/javascript">
        $('#insert').click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var medicine_type = $("select[name = 'medicine_type\\[\\]']").map(function () {
                return $(this).val();
            }).get().join("||||");

            var medicine_name = $("input[name = 'medicine_name\\[\\]']").map(function () {
                return $(this).val();
            }).get().join("||||");

            var medicine_quantity = $("input[name = 'medicine_quantity\\[\\]']").map(function () {
                return $(this).val();
            }).get().join("||||");

            var history = $("#history").val();
            var age = $("#age").val();
            var weight = $("#weight").val();
            var bloodpressure = $("#bloodpressure").val();
            var temprature = $("#temprature").val();
            var patient_id = $("#patient_id").val();
            var doctor_id = $("#doctor_id").val();

            $.ajax({
                type: 'POST',
                url: '/insert_prescription',
                dataType: 'JSON',
                data: {
                    medicine_type: medicine_type,
                    medicine_name: medicine_name,
                    medicine_quantity: medicine_quantity,
                    history: history,
                    age: age,
                    weight: weight,
                    temprature: temprature,
                    bloodpressure: bloodpressure,
                    patient_id: patient_id,
                    doctor_id: doctor_id
                },
                success: function (msg) {
                    sessionStorage.clear();
                    window.location = 'http://localhost:8000/doctor';
                },
                failure: function (msg) {
                    console.log(msg);
                }
            });
        });
    </script>
@endsection
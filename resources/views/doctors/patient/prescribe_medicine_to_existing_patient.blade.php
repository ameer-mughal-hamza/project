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
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" id="patient_name" class="form-control input-sm"
                                                           disabled
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
                                                           disabled
                                                           placeholder="Mobile Number"
                                                           value="{{ $patient->patient_mobile }}">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{--Medicine prescription goes gere--}}
                        <div class="col-md-8">
                            <div class="admin-content-con clearfix">
                                <header>
                                    <h5>Prescription</h5>
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
                                        <input type="text" id="patient_id" class="hidden" value="{{ $patient->id }}">
                                        <input type="text" id="doctor_id" class="hidden" value="{{ Auth::user()->id }}">
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
            $("#medicine_name").autocomplete({
                source: 'http://localhost:8000/search'
            });
        });
    </script>
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
                    window.location = 'http://localhost:8000/doctor/show-patient/' + patient_id;
                },
                failure: function (msg) {
                    console.log(msg);
                }
            });
        });
    </script>
@endsection
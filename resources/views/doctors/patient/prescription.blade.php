@extends('admin.admin-layouts.admin-master')
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
                        <div class="col-md-12">
                            <div class="admin-content-con clearfix">
                                <header>
                                    <h5>Prescription</h5>
                                </header>

                                <table id="medicine_prescription" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Medicine Type</th>
                                        <th>Medicine Name</th>
                                        <th>Quantity</th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody>
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
                                            <input type="text" name="medicine_name[]" id="medicine_name"
                                                   placeholder="Enter medicine name"
                                                   data-srno="1" class="form-control input-sm medicine_name"
                                                   autocomplete="off"/></td>
                                        <td>
                                            <input type="text" name="medicine_quantity[]" id="medicine_quantity"
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
                                </table>
                                <tr>
                                    <td colspan="2" align="center">
                                        <button type="submit" id="insert" class="btn btn-sm ">Insert</button>
                                    </td>
                                </tr>
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
    {{--All scripts of this page will include in the master layout structure and then display--}}
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{URL::to('js/bootstrap.js/bootstrap.min.js') }}"></script>
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
            var medicine_type = $("select[name = 'medicine_type\\[\\]']").map(function () {
                return $(this).val();
            }).get().join("||||");

            var medicine_name = $("input[name = 'medicine_name\\[\\]']").map(function () {
                return $(this).val();
            }).get().join("||||");

            var medicine_quantity = $("input[name = 'medicine_quantity\\[\\]']").map(function () {
                return $(this).val();
            }).get().join("||||");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/insertdata',
                dataType: 'JSON',
                data: {
                    medicine_type: $("#medicine_type").val(),
                    medicine_name: $("#medicine_name").val(),
                    medicine_quantity: $("#medicine_quantity").val()
                },
                success: function (msg) {
                    alert(msg)
                },
                failure: function (msg) {
                    alert('failure');
                }
            });
        });
    </script>
@endsection
@endsection
@extends('doctors.doctor-layouts.doctor-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/tags.css') }}">

@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
            @include('doctors.doctor-partials.doctor-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
            @include('doctors.doctor-partials.doctor-header')
            <!-- main content area -->
                <div class="row">
                    <div class="col-md-4 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header class="clearfix">
                                <h5 class="pull-left">Patient Detail</h5>
                                <a href="{{ route('prescribe_medicine_to_existing_patient', ['id'=>$patient->id]) }}"
                                   class="pull-right"><i class="fa fa-pencil"></i></a>
                            </header>
                            <h4>Name : {{ $patient->patient_name }}</h4>
                            <h6>Mobile No. : {{ $patient->patient_mobile }}</h6>
                            <h6>Total Prescriptions : {{ $medicines->count() }}</h6>
                        </div>
                    </div>
                    <div class="col-md-8 dashboard-right-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Prescriptions</h5>
                            </header>
                            @if($medicines->count() > 0)
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>Sr. #</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($medicines as $medicine)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ date('M j, Y', strtotime($medicine->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('doctor.view_report',['id'=>$medicine->id]) }}"
                                                   class="btn btn-xs btn-success button"
                                                   role="button">view</a>
                                                <a
                                                        class="btn btn-xs btn-danger button"
                                                        data-id="{{ $medicine->id }}"
                                                        role="button" id="delete">del</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h4>No Prescription</h4>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '#delete', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).data('id');

            swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                },
                function () {
                    $.ajax({
                        type: "POST",
                        url: "/doctor/medicine/delete",
                        data: {id: id},
                        success: function (data) {
                            location.reload();
                        }, error: function (data) {
                            console.log(data);
                        }
                    });
                });
        });
    </script>
@endsection

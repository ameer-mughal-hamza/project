@extends('admin.admin-layouts.admin-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/tags.css') }}">
@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
            @include('admin.admin-partials.admin-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
            @include('admin.admin-partials.admin-header')
            <!-- main content area -->
                <div class="row">
                    <div class="col-md-4 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Patient Detail</h5>
                            </header>
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3" style="margin-bottom: 15px;">
                                    <img src="/doctor-images/default.jpg"
                                         id="profile-img-tag"
                                         style="border-radius: 50%; width: 150px; height: 150px;"/>
                                </div>
                            </div>
                            <h4>Name : {{ $patient->patient_name }}</h4>
                            <h6>Mobile No. : {{ $patient->patient_mobile }}</h6>
                            <h6>Patient of : {{ $doctor->first_name . ' ' . $doctor->last_name }}</h6>
                            <h6>Total Prescriptions : {{ $medicines->count() }}</h6>
                        </div>
                    </div>
                    <div class="col-md-8 dashboard-right-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Prescriptions</h5>
                            </header>

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
                                            <a href="{{ route('admin.view_report',['id'=>$medicine->id]) }}"
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
                        url: "/admin/medicine/delete",
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

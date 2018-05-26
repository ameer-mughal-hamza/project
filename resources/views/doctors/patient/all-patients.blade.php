@extends('doctors.doctor-layouts.doctor-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
@endsection
@section('content')

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('doctors.doctor-partials.doctor-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('doctors.doctor-partials.doctor-header')
                <div id="dashboard-con">
                    <div class="row">
                        <div class="col-md-12 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Patients</h5>
                                </header>
                                <div class="row">
                                    @foreach($patients as $patient)
                                        <div class="col-md-4 col-sm-6">
                                            <div class="single-service">
                                                <a href="">
                                                    <div class="clearfix">
                                                        <div class="single-icon pull-left">
                                                            <div class="single-icon">
                                                                <a data-id="{{ $patient->id }}" id="delete"
                                                                   role="button"><i class="fa fa-trash"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="single-icon pull-right">
                                                            <div class="single-icon">
                                                                <a href="{{ route('prescribe_medicine_to_existing_patient', ['id'=>$patient->id]) }}"><i
                                                                            class="fa fa-pencil"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="single-icon">
                                                            <a href="{{ route('doctor.patient.show',['id'=>$patient->id])}}"><i
                                                                        class="fa fa-eye"></i></a>
                                                        </div>
                                                    </div>
                                                    <h3>{{ $patient->patient_name }}</h3>
                                                    <h3>{{ $patient->patient_mobile }}</h3>
                                                </a>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            {{ $patients->links() }}
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
@endsection
{{--All scripts of this page will include in the master layout structure and then display--}}
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
                        url: "/patient/destroy",
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
@extends('pharmacist.pharmacist-layouts.pharmacist-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
        @include('pharmacist.pharmacist-partials.pharmacist-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('pharmacist.pharmacist-partials.pharmacist-header')
                <div id="dashboard-con">
                    <div class="row">
                        {{--Patient Information goes gere--}}
                        <div class="col-md-4">
                            <div class="admin-content-con" id="patient_info_form">
                                <header class="clearfix">
                                    <h5 class="pull-left">Search Prescription</h5>
                                </header>
                                <div class="content">
                                    <form
                                            id="search_prescription" method="post">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group {{ $errors->has('patient_mobile') ? 'has-error' : '' }}">
                                                    <label>Enter ID:</label>
                                                    <input type="text" name="id" id="id"
                                                           class="form-control input-sm"
                                                           placeholder="Enter id here">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" id="search"
                                                       class="btn btn-primary pull-left btn-sm"
                                                       value="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="admin-content-con clearfix" id="prescription">
                                <header class="clearfix">
                                    <h5 style="float: left;">Prescription</h5>
                                    <i class="fa fa-repeat pull-right" id="reset-form" role="button"></i>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    @if(isset($prescription))
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Doctor Name</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    @endif
                                    </thead>
                                    <tbody>
                                    @if(isset($error))
                                        <tr>{{ $error }}</tr>
                                    @elseif(isset($prescription))
                                        @foreach( $prescription as $p)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>Dr. {{$doctor->first_name}}</td>
                                                <td>{{ date('M j, Y', strtotime($p->created_at)) }}</td>
                                                <td>
                                                    <a class="btn btn-xs btn-warning"
                                                       href="{{ route('pharmacist.view_report',$p->id) }}"
                                                       role="button">view</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
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
    <script type="text/javascript">
        $('#search').click(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $("#id").val();

            $.ajax({
                type: 'POST',
                url: '/pharmacist/search-prescription',
                dataType: 'JSON',
                data: {
                    id: id,
                },
                success: function (msg) {
                    console.log('Success');
                },
                failure: function (msg) {
                    console.log(msg);
                }
            });
        });
    </script>
@endsection
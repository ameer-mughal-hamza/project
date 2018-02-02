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

                    <div class="admin-content-con">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#patientsTab" class="text-link" data-toggle="tab">Patients</a>
                            </li>
                            <li><a href="#postsTab" class="text-link" data-toggle="tab">Posts</a></li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="tab-content">
                            <div class="col-md-12 dashboard-left-cell tab-pane active" id="patientsTab">
                                <div class="admin-content-con">
                                    <header class="clearfix">
                                        <h5 class="pull-left">Patients</h5>
                                    </header>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Mobile Number</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($patients as $patient)
                                            <tr>
                                                <td>{{ $patient->patient_name }}</td>
                                                <td>{{ $patient->patient_mobile }}</td>
                                                <td class="pull-right">
                                                    <a class="btn btn-xs btn-warning"
                                                       href="{{ route('prescribe_medicine_to_existing_patient',['id' => $patient->id]) }}"
                                                       role="button">Prescribe Medicine</a>
                                                    <a class="btn btn-xs btn-primary"
                                                       href="{{ route('show_patient_detail',['id' => $patient->id]) }}"
                                                       role="button">view</a>
                                                    <a class="btn btn-xs btn-danger"
                                                       href=""
                                                       role="button">del</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="clearfix">
                                        <a href=""
                                           class="pull-right text-link">view all
                                            patients</a>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 dashboard-left-cell tab-pane" id="postsTab">
                                <div class="admin-content-con">
                                    <header class="clearfix">
                                        <h5 class="pull-left">Posts</h5>
                                    </header>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Content</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        {{--@foreach(1)--}}
                                        <tr>
                                            <td>Ameer Hamza</td>
                                            <td>03216417307</td>
                                            <td class="pull-right">
                                                <a class="btn btn-xs btn-warning"
                                                   href=""
                                                   role="button">edit</a>
                                                <a class="btn btn-xs btn-primary"
                                                   href="" role="button">view</a>
                                                <a class="btn btn-xs btn-danger"
                                                   href=""
                                                   role="button">del</a>
                                            </td>
                                        </tr>
                                        {{--@endforeach--}}
                                        </tbody>
                                    </table>
                                    <div class="clearfix">
                                        <a href=""
                                           class="pull-right text-link">view all
                                            articles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="admin-content-con clearfix">
                                <header>
                                    <h5>Commenters</h5>
                                </header>

                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Kingsley Ijomah</td>
                                        <td>kingsley.ijomah@example.com</td>
                                        <td><a href="#" class="label label-default">pending</a></td>
                                        <td>Today 5:60pm - 14/09/2015</td>
                                        <td><a href="#" class="label label-danger">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Kingsley Ijomah</td>
                                        <td>kingsley.ijomah@example.com</td>
                                        <td><a href="#" class="label label-success">active</a></td>
                                        <td>Today 5:60pm - 14/09/2015</td>
                                        <td><a href="#" class="label label-danger">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Kingsley Ijomah</td>
                                        <td>kingsley.ijomah@example.com</td>
                                        <td><a href="#" class="label label-success">active</a></td>
                                        <td>Today 5:60pm - 14/09/2015</td>
                                        <td><a href="#" class="label label-danger">Delete</a></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Kingsley Ijomah</td>
                                        <td>kingsley.ijomah@example.com</td>
                                        <td><a href="#" class="label label-success">active</a></td>
                                        <td>Today 5:60pm - 14/09/2015</td>
                                        <td><a href="#" class="label label-danger">Delete</a></td>
                                    </tr>
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
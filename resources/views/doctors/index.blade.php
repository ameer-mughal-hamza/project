@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
@endsection
@section('content')

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('admin.admin-partials.admin-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div id="dashboard-con">
                    <div class="row">
                        <div class="col-md-12 dashboard-left-cell">
                            <div class="admin-content-con">
                                <header class="clearfix">
                                    <h5 class="pull-left">Doctors</h5>
                                    <a class="btn btn-xs btn-primary pull-right" href="{{ route('doctors.create') }}"
                                       role="button">Create Doctor</a>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->first_name . ' ' . $doctor->last_name }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            <td>{{ date('M j, Y', strtotime($doctor->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-warning" href="" role="button">edit</a>
                                                <a class="btn btn-xs btn-primary" href="{{ route('doctors.show',$doctor->id) }}" role="button">view</a>
                                                <a class="btn btn-xs btn-danger" href="{{ route('doctors.destroy', $doctor->id) }}" role="button">del</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="clearfix">
                                    <a href="{{ route('doctors.all') }}" class="pull-right text-link">view all
                                        doctors</a>
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
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
                                                <a class="btn btn-xs btn-primary"
                                                   href="{{ route('doctors.show', ['id',$doctor->id]) }}" role="button">view</a>
                                                <a class="btn btn-xs btn-danger" href="" role="button">del</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
    <script src="{{URL::to('bootstrap}}"></script>
@endsection
@endsection
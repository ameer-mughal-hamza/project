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
                                    <h1 class="pull-left">{{ $degree->name }} <small>{{ $degree->doctors()->count() }} Degrees</small></h1>
                                    <a class="btn btn-primary pull-right" href="{{ route('degrees.edit', $degree->id) }}" role="button">Edit</a>
                                    <a class="btn btn-danger pull-right" href="{{ route('degrees.destroy', $degree->id) }}" role="button">Del</a>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Tags</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($degree->doctors as $doctor)
                                        <tr>
                                            <td>{{ $doctor->id }}</td>
                                            <td>{{ $doctor->first_name .' '.$doctor->last_name }}</td>
                                            <td>
                                                @foreach($doctor->degrees as $degree)
                                                    <span class="label label-warning">{{ $degree->name }}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('post', $degree->id) }}" class="btn btn-primary btn-xs">View</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
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
        {{--All scripts of this page will include in the master layout structure and then display--}}
        @section('scripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <script src="{{URL::to('js/bootstrap.js/bootstrap.min.js') }}"></script>
        @endsection
@endsection
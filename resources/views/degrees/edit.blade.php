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


                <div id="content" class="col-md-12">
                    <header>
                        <h2 class="page_title">Edit Degree</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{route('degrees.update', $degree->id)}}" method="POST">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="sr-only">Edit Tag</label>
                                        <input type="text" class="form-control" name="edit_degree" id="edit_degree" placeholder="Edit Tag" value="{{ $degree->name }}">
                                    </div>
                                    <div class="form-group">
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger">Save</button>
                                    </div>
                                </div>
                            </form>
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
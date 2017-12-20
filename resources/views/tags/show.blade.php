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
                                    <h1 class="pull-left">{{ $tag->name }} <small>{{ $tag->posts()->count() }} Posts</small></h1>
                                    <a class="btn btn-primary pull-right" href="{{ route('tags.edit', $tag->id) }}" style="margin-top: 22px;" role="button">Edit</a>
                                    <a class="btn btn-danger pull-right" href="{{ route('tags.destroy', $tag->id) }}" style="margin-top: 22px;" role="button">Del</a>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Tags</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tag->posts as $post)
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>
                                            @foreach($post->tags as $tag)
                                                <span class="label label-warning">{{ $tag->name }}</span>
                                            @endforeach
                                            </td>
                                            <td>
                                                <a href="{{ route('post', $post->id) }}" class="btn btn-primary btn-xs">View</a>
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
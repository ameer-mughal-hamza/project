{{--@extends('layouts.master')--}}

{{--@section('content')--}}
{{--<div style="padding-top : 100px;">--}}
{{--<div class="container">--}}
{{--@if(Session::has('info'))--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<p class="alert alert-info">{{ Session::get('info') }}</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endif--}}
{{--<div class="row">--}}
{{--<div class="col-md-9">--}}
{{--<h2>All Posts</h2>--}}
{{--</div>--}}
{{--<div class="col-md-3">--}}
{{--<a href="{{ route('blog.create') }}" class="btn btn-block btn-h1-spacing btn-block btn-lg btn-default">Create New Post</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--<hr>--}}
{{--<div class="row">--}}
{{--<div class="col-md-12">--}}
{{--<table class="table table-bordered">--}}
{{--<thead>--}}
{{--<th>Title</th>--}}
{{--<th>Body</th>--}}
{{--<th>Created at</th>--}}
{{--<th>Actions</th>--}}
{{--</thead>--}}
{{--<tbody>--}}
{{--@foreach($posts as $post)--}}
{{--<tr>--}}
{{--<td>{{ $post->title }}</td>--}}
{{--<td>{!! substr($post->content,0 , 50) !!}{{ strlen($post->content) > 50 ? "...":"" }}</td>--}}
{{--<td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>--}}
{{--<td colspan="4">--}}
{{--<a href="{{ route('post',['id' => $post->id]) }}" class="btn btn-default">View</a>--}}
{{--<a href="{{ route('blog.edit',['id' => $post->id]) }}" class="btn btn-default">Edit</a>--}}
{{--<a href="{{ route('blog.post.delete',['id' => $post->id]) }}" class="btn btn-default">Delete</a>--}}
{{--</td>--}}
{{--</tr>--}}
{{--@endforeach--}}
{{--</tbody>--}}
{{--</table>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
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
                                    <h5 class="pull-left">Articles</h5>
                                    <a class="btn btn-xs btn-primary pull-right" href="{{ route('blog.create') }}" role="button">Create new
                                        article</a>
                                </header>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Body</th>
                                        <th>Created</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $posts as $post)
                                        <tr>
                                            <td>{{ $post->title }}</td>
                                            <td>{!! substr($post->content,0 , 50) !!}{{ strlen($post->content) > 50 ? "...":"" }}</td>
                                            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
                                            <td>
                                                <a class="btn btn-xs btn-warning" href="{{ route('blog.edit',['id' => $post->id]) }}" role="button">edit</a>
                                                <a class="btn btn-xs btn-primary" href="{{ route('post',['id' => $post->id]) }}" role="button">view</a>
                                                <a class="btn btn-xs btn-danger" href="{{ route('blog.post.delete',['id' => $post->id]) }}" role="button">del</a>
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
    <script src="{{URL::to('js/bootstrap.js/bootstrap.min.js') }}"></script>
@endsection
@endsection
@extends('admin.admin-layouts.admin-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('chosen_v1.4.0/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('summernote-master/dist/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/new-article.css') }}">
@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @if(Auth::guard('admin')->check())
            @include('admin.admin-partials.admin-navbar')
        @else
            @include('doctors.doctor-partials.doctor-navbar')
        @endif
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @if(Auth::guard('admin')->check())
                    @include('admin.admin-partials.admin-header')
                @else
                    @include('doctors.doctor-partials.doctor-header')
                @endif
                <div id="content">
                    <header>
                        <h2 class="page_title">Create new article</h2>
                    </header>

                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{route('blog.post.create')}}" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="sr-only">Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Tags</label>
                                    <select data-placeholder="Select tags" multiple name="tags[]"
                                            class="form-control chosen-select" multiple="multiple">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Article</label>
                                    <textarea class="form-control summernote" placeholder="Article"
                                              name="content"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="upload-image">Upload Image</label>
                                    <input type="file" name="upload-image"/>
                                </div>
                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Save">
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
@section('scripts')
    <script src="{{URL::to('chosen_v1.4.0/chosen.jquery.min.js') }}"></script>
    <script src="{{URL::to('summernote-master/dist/summernote.min.js') }}"></script>

    <script type="text/javascript">
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-result': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            $(selector).chosen(config[selector]);
        }
    </script>

    <script type="text/javascript">
        $('.summernote').summernote({
            height: 200
        })
    </script>
@endsection
@endsection
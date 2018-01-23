@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('chosen_v1.4.0/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('font-awesome-4.3.0/css/summernote.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('summernote-master/dist/summernote.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/new-article.css') }}">
@endsection
@endsection
@section('content')

    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('admin.admin-partials.admin-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                @include('admin.admin-partials.errors')
                <div id="content" class="col-md-8" style="margin-left: 180px;">
                    <header>
                        <h2 class="page_title">Create new Doctor</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{route('doctors.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6" style="margin-bottom: 15px;">
                                        <label for="upload-image">Upload Image</label>
                                        <input type="file" name="upload-image" id="profile-img"/>
                                        <img src="" id="profile-img-tag"
                                             style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                   placeholder="First Name">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   placeholder="Last Name">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                   placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">Password</label>
                                            <input type="text" class="form-control" name="password" id="password"
                                                   placeholder="Password (default:user1234)">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">Password</label>
                                            <input type="text" class="form-control" name="fee"
                                                   placeholder="Enter fee here">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Category</label>
                                    <select data-placeholder="Select categories" multiple name="categories[]"
                                            class=" form-control chosen-select" multiple="multiple">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Degree</label>
                                    <select data-placeholder="Select degrees" multiple name="degrees[]"
                                            class=" form-control chosen-select" multiple="multiple">
                                        @foreach($degrees as $degree)
                                            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Description</label>
                                    <textarea class="form-control" name="description" rows="5"
                                              placeholder="Enter description here"></textarea>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">PMDC_verified</label>
                                    <input type="checkbox" value="0" name="pmdc_verified"> PMDC Verified
                                </div>

                                {{--<div class="form-group">--}}
                                {{--<label for="upload-image">Upload Image</label>--}}
                                {{--<input type="file" name="upload-image"/>--}}
                                {{--<input type="file" name="upload-image" id="profile-img"/>--}}
                                {{--<img src="" id="profile-img-tag"--}}
                                {{--style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;"/>--}}
                                {{--</div>--}}

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

    {{--All scripts of this page will include in the master layout structure and then display--}}
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
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#profile-img-tag').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#profile-img").change(function () {
            readURL(this);
        });
    </script>
@endsection
@endsection
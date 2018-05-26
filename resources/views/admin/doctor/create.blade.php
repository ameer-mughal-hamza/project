@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('chosen_v1.4.0/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ URL::to('font-awesome.min.css') }}">
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
                <div id="content" class="col-md-8" style="margin-left: 180px;">
                    <header>
                        <h2 class="page_title">Create new Doctor</h2>
                    </header>
                    <div class="content-inner">
                        <div class="form-wrapper">
                            <form action="{{route('doctors.store')}}" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-4" style="margin-bottom: 15px;">
                                        <img src="/doctor-images/default.jpg" id="profile-img-tag"
                                             style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                                        <label for="profile-img" class="change-img-btn">
                                            <img src="{{ URL::asset("/images/camera-logo.png") }}"
                                                 style="width: 32px; height: 32px;"/>
                                        </label>
                                        <input id="profile-img" name="file" type="file" style="display: none;">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                   placeholder="First Name" value="{{ old('first_name') }}">
                                            @if($errors->has('first_name'))
                                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                            <label class="control-label">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   placeholder="Last Name" value="{{ old('last_name') }}">
                                            @if($errors->has('last_name'))
                                                <span class="help-block">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                            <label class="control-label">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                   placeholder="Email" value="{{ old('email') }}">
                                            @if($errors->has('email'))
                                                <span class="help-block">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                            <label class="control-label">Password</label>
                                            <input type="text" class="form-control" name="password" id="password"
                                                   placeholder="Password" value="{{ old('password') }}">
                                            @if($errors->has('password'))
                                                <span class="help-block">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('fee') ? 'has-error' : '' }}">
                                            <label class="control-label">Fee</label>
                                            <input type="text" class="form-control" name="fee"
                                                   placeholder="Enter fee here" value="{{ old('fee') }}">
                                            @if($errors->has('fee'))
                                                <span class="help-block">{{ $errors->first('fee') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                    <label class="control-label">Category</label>
                                    <div class="form-group">
                                        <select class="form-control" name="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->name }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--<textarea name="category" id="category" cols="74" rows="5"--}}
                                    {{--placeholder="Enter category description here"--}}
                                    {{--style="padding: 5px;">{{ old('category') }}</textarea>--}}
                                    {{--@if($errors->has('category'))--}}
                                    {{--<span class="help-block">{{ $errors->first('category') }}</span>--}}
                                    {{--@endif--}}
                                </div>

                                <div class="form-group {{ $errors->has('education') ? 'has-error' : '' }}">
                                    <label class="control-label">Education</label>
                                    <textarea name="education" id="education" cols="74" rows="5"
                                              placeholder="Enter education detail here"
                                              style="padding: 5px;">{{ old('education') }}</textarea>
                                    @if($errors->has('education'))
                                        <span class="help-block">{{ $errors->first('education') }}</span>
                                    @endif
                                </div>

                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label class="control-label">Description</label>
                                    <textarea class="form-control" name="description" rows="5"
                                              placeholder="Enter description here">{{ old('description') }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <input type="checkbox" value="0" name="pmdc_verified">
                                    <label class="control-label">PMDC_verified</label>
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
@extends('admin.admin-layouts.admin-master')
@section('style-sheet')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('chosen_v1.4.0/chosen.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('font-awesome-4.3.0/css/summernote.min.css') }}">
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
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6" style="margin-bottom: 15px;">
                                        <img src="/doctor-images/{{ $doctor->image_url }}" id="profile-img-tag"
                                             style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; margin-bottom: 15px;"/>
                                        <input type="file" name="file" id="profile-img"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                   placeholder="First Name" value="{{ $doctor->first_name }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="sr-only">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   placeholder="Last Name" value="{{ $doctor->last_name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="sr-only">Email</label>
                                            <input type="text" class="form-control" name="email" id="email"
                                                   placeholder="Email" value="{{ $doctor->email }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Category</label>
                                    <select data-placeholder="Select categories" multiple name="categories[]"
                                            value="{{$doctor->category}}"
                                            class=" form-control chosen-select" multiple="multiple">
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Degree</label>
                                    <select data-placeholder="Select degrees" multiple name="degrees[]"
                                            class=" form-control chosen-select" multiple="multiple">
                                        @foreach($degree as $degree)
                                            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">Description</label>
                                    <textarea class="form-control" name="description" rows="5"
                                              placeholder="Enter description here">{{ $doctor->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label class="sr-only">PMDC_verified</label>
                                    <input type="checkbox" value="{{ $doctor->pmdc_verified }}" name="pmdc_verified">
                                    PMDC Verified
                                </div>

                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Save"/>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <footer id="admin-footer" class="clearfix">
                        <div class="pull-left"><b>Copyright </b>&copy; 2017</div>
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

    {{--Previewing image in a image view before uploading the photo on server--}}
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
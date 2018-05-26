@extends('doctors.doctor-layouts.doctor-master')
@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}"
          xmlns:Auth="http://www.w3.org/1999/xhtml">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/index.css') }}">
@endsection
@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('doctors.doctor-partials.doctor-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('doctors.doctor-partials.doctor-header')
                <div id="dashboard-con">
                    <div class="col-md-6 col-md-offset-3 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>{{ Auth::user()->first_name }}'s Profile</h5>
                            </header>

                            <form action="{{route('doctor.update')}}" method="POST" enctype="multipart/form-data"
                                  style="margin-bottom: 40px;">
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-4" style="margin-bottom: 15px;">
                                        <img src="/doctor-images/{{ $doctor->image_url }}"
                                             id="profile-img-tag"
                                             style="border-radius: 50%; width: 150px; height: 150px;"/>
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
                                            <label for="first_name" class="control-label">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                   placeholder="First Name" value="{{ $doctor->first_name }}">
                                            @if($errors->has('first_name'))
                                                <span class="help-block">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                                            <label for="last_name" class="control-label">Last Name</label>
                                            <label class="sr-only">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   placeholder="Last Name" value="{{ $doctor->last_name }}">
                                            @if($errors->has('last_name'))
                                                <span class="help-block">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group {{ $errors->has('fee') ? 'has-error' : '' }}">
                                            <label for="fee" class="control-label">Fee</label>
                                            <input type="text" class="form-control" name="fee" id="fee"
                                                   placeholder="Fee" value="{{ $doctor->fee}}">
                                            @if($errors->has('fee'))
                                                <span class="help-block">{{ $errors->first('fee') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gender" class="control-label">Gender</label>
                                            <select class="form-control" name="gender">
                                                <option value="male" {{ $doctor->gender === 'male' ? 'selected' : ''}}>
                                                    Male
                                                </option>
                                                <option value="female" {{ $doctor->gender === 'female' ? 'selected' : ''}}>
                                                    Female
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                                    <label for="category" class="control-label">Category</label>
                                    <textarea name="category" id="category" cols="60" rows="4"
                                              placeholder="Enter category details here"
                                              style="padding: 5px;"
                                              class="form-control">{{ $doctor->category }}</textarea>
                                    @if($errors->has('category'))
                                        <span class="help-block">{{ $errors->first('category') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('education') ? 'has-error' : '' }}">
                                    <label for="education" class="control-label">Education</label>
                                    <textarea name="education" id="education" cols="60" rows="4"
                                              placeholder="Enter category education details here"
                                              style="padding: 5px;"
                                              class="form-control">{{ $doctor->education }}</textarea>
                                    @if($errors->has('education'))
                                        <span class="help-block">{{ $errors->first('education') }}</span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <label for="description" class="control-label">Description</label>
                                    <textarea name="description" id="description" cols="60" rows="4"
                                              placeholder="Enter Description here"
                                              style="padding: 5px;"
                                              class="form-control">{{ $doctor->description }}</textarea>
                                    @if($errors->has('description'))
                                        <span class="help-block">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                                <input type="text" hidden value="{{ Auth::user()->id }}" name="id" id="id">
                                <div class="clearfix">
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary pull-right" value="Update"/>
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
@endsection
@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>

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


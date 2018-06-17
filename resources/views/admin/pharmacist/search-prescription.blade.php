@extends('pharmacist.pharmacist-layouts.pharmacist-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/tags.css') }}">
@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
            @include('pharmacist.pharmacist-partials.pharmacist-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
            @include('pharmacist.pharmacist-partials.pharmacist-header')
            <!-- main content area -->
                <div class="row">
                    <div class="col-md-4 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Medicine</h5>
                            </header>

                            <form action="{{ route('pharmacist.medicine.create') }}" method="POST">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label">Add a new medicine...</label>
                                    <p>
                                        <textarea class="form-control" rows="3" name="name"
                                                  placeholder="e.g Panadol, Lomper">{{ old('name') }}</textarea>
                                    </p>
                                    @if($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                    {{ csrf_field() }}
                                    <p>
                                        <input type="submit" class="btn btn-large btn-block btn-primary" value="Save">
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on('click', '#delete', function (e) {
            e.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var id = $(this).data('id');

            swal({
                    title: "Are you sure!",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes!",
                    showCancelButton: true,
                },
                function () {
                    $.ajax({
                        type: "POST",
                        url: "/medicine/delete",
                        data: {id: id},
                        success: function (data) {
                            location.reload();
                        }, error: function (data) {
                            console.log(data);
                        }
                    });
                });
        });
    </script>
@endsection

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

                            <form action="{{ route('pharmacist.medicine.store') }}" method="POST">
                                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <label class="control-label">Add a new medicine...</label>
                                    <p>
                                        <textarea class="form-control" rows="3" name="name"
                                                  placeholder="e.g Panadol, Lomper">{{ old('name') }}</textarea>
                                    </p>
                                    @if($errors->has('name'))
                                        <span class="help-block">{{ $errors->first('name') }}</span>
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label">Type</label>
                                        <select class="form-control {{ Session::get('info') ? 'has-error' : '' }}"
                                                name="type">
                                            <option value="not-specified">Not Specified</option>
                                            <option value="tablet">Tablet</option>
                                            <option value="syrup">Syrup</option>
                                            <option value="injection">Injection</option>
                                            <option value="capsule">Capsule</option>
                                        </select>
                                        @if(Session::has('info'))
                                            <span class="help-block"
                                                  style="color: red;">{{ Session::get('info') }}</span>
                                        @endif
                                    </div>
                                    {{ csrf_field() }}
                                    <p>
                                        <input type="submit" class="btn btn-large btn-block btn-primary" value="Save">
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-8 dashboard-right-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Medicines</h5>
                            </header>

                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($medicines as $medicine)
                                    <tr>
                                        <td>{{ strtoupper($medicine->medicine_name) }}</td>
                                        <td>{{ strtoupper($medicine->medicine_type) }}</td>
                                        <td>
                                            <a href="{{ route('pharmacist.med.edit',['id'=>$medicine->id]) }}"
                                               class="btn btn-xs btn-warning" role="button">edit</a>
                                            <a class="btn btn-xs btn-danger button" data-id="{{ $medicine->id }}"
                                               role="button"
                                               id="delete">del</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                {{ $medicines->links() }}
                            </div>
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

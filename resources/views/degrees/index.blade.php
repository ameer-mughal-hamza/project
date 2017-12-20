@extends('admin.admin-layouts.admin-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/tags.css') }}">
@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
            @include('admin.admin-partials.admin-navbar')
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
            @include('admin.admin-partials.admin-header')
            <!-- main content area -->
                <div class="row">
                    <div class="col-md-4 dashboard-left-cell">
                        <div class="admin-content-con">
                            <header>
                                <h5>Create Degrees</h5>
                            </header>

                            <form action="{{ route('degrees.store') }}" method="POST">
                                <div class="form-group">
                                    <label>Add a new degree...</label>
                                    <p>
                                        <textarea class="form-control" rows="3" name="name"
                                                  placeholder="e.g FCPS, MCPS"></textarea>
                                    </p>
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
                                <h5>Degrees</h5>
                            </header>

                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($degrees as $degree)
                                    <tr>
                                        <td><a href="{{ route('degrees.show', $degree->id) }}">{{ $degree->name }}</a></td>
                                        <td>{{ date('M j, Y', strtotime($degree->created_at)) }}</td>
                                        <td>
                                            <a href="{{ route('degrees.destroy', $degree->id) }}" class="btn btn-xs btn-warning" role="button">del</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection

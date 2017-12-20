@extends('layouts.master')

@section('content')

    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="{{ asset('images/red.jpg') }}" alt="...">
            </div>
            <div class="item">
                <img src="{{ asset('images/green.jpg') }}" alt="...">
            </div>
            <div class="item">
                <img src="{{ asset('images/blue.jpg') }}" alt="...">
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
            <div class="col-md-6">
                <ul>
                    <li>
                        <img src="{{ asset('images/Capture66.PNG') }}" height="120" width="120">
                        <p>Ameer Hamza</p>
                    </li>
                    <li>
                        <img src="{{ asset('images/Capture66.PNG') }}" height="120" width="120">
                        <p>Ameer Hamza</p>
                    </li>
                    <li>
                        <img src="{{ asset('images/Capture66.PNG') }}" height="120" width="120">
                        <p>Ameer Hamza</p>
                    </li>
                    <li>
                        <img src="{{ asset('images/Capture66.PNG') }}" height="120" width="120">
                        <p>Ameer Hamza</p>
                    </li>
                    <li>
                        <img src="{{ asset('images/Capture66.PNG') }}" height="120" width="120">
                        <p>Ameer Hamza</p>
                    </li><li>
                        <img src="{{ asset('images/Capture66.PNG') }}" height="120" width="120">
                        <p>Ameer Hamza</p>
                    </li>
                    <li>
                        <img src="{{ asset('images/Capture66.PNG') }}" height="120" width="120">
                        <p>Ameer Hamza</p>
                    </li>

                </ul>
            </div>
            <div class="col-md-6">
                <h1>ass="glyphicon glyphicon-chevron-left" a</h1>
            </div>
        </div>
    </div>
@endsection
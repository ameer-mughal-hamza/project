<!DOCTYPE HTML>
<html>
<head>
    <title>Sickbay</title>
    <link rel="stylesheet" href="{{ URL::to('css/readable-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="{{ URL::to('font-awesome-4.3.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('custom-css/preloader.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @yield('style-sheet')
</head>
<body>
@yield('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
@yield('scripts')
</html>
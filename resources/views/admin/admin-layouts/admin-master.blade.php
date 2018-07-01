<!DOCTYPE HTML>
<html>
<head>
    <title>Sickbay</title>
    <link rel="stylesheet" href="{{ URL::to('css/readable-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #sickbay {
            height: 100%;
        }
    </style>
    @yield('style-sheet')
</head>
<body>
<div id="sickbay">
    @yield('content')
</div>
<script src="{{ URL::to('js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@include('sweet::alert')
</body>
<!-- <script src="{{ URL::to('js/jquery.min.js') }}"></script> -->
<!-- <script src="{{ URL::to('js/bootstrap.min.js') }}"></script> -->
<!-- <script src="https://unpkg.com/vue@2.4.2"></script> -->

@yield('scripts')
</html>
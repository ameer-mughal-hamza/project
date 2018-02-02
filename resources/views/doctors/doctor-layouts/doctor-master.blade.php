<!DOCTYPE HTML>
<html>
<head>
    <title>Sickbay</title>
    <link rel="stylesheet" href="{{ URL::to('css/readable-bootstrap.min.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    @yield('style-sheet')
</head>
<body>
@yield('content')
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="{{URL::to('js/bootstrap.min.js') }}"></script>
@yield('scripts')
</html>
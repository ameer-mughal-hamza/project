<!DOCTYPE HTML>
<html>
<head>
    <title>Sickbay</title>
    <link rel="stylesheet" href="{{ URL::to('css/readable-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/style.css') }}">
    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({ 
            selector:'textarea',
            plugins:'link code',
            menubar:'false'
        });
    </script> -->
</head>
<body>
    @include('partials.header')
    @yield('content')
</body>
    <script src="{{URL::to('js/jquery.min.js') }}"></script>
    <script src="{{URL::to('js/bootstrap.min.js') }}"></script>
    <script src="{{URL::to('custom-js/front-end.js') }}"></script>
    <script src="{{URL::to('js/classie.js') }}"></script>
    <script src="{{URL::to('js/cbpAnimatedHeader.js') }}"></script>
</html>
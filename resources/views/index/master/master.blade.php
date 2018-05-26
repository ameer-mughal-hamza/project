<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mhbthemes.com/demos/rx/rx/home.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 12:17:33 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Rx is a Personal Portfolio Template">
        <meta name="keywords"
              content="mhbthemes, resume, cv, portfolio, personal, developer, designer,personal resume, onepage, clean, modern">
        <meta name="author" content="Alex Smith">

        <title>Sickbay</title>

        <!-- Favicon -->
        <!--<link rel="shortcut icon" href="assets/img/favicon.png" type="image/png">-->
        <link rel="stylesheet" href="{{ URL::to('main-web-img/favicon.png') }}">

        <!--== bootstrap ==-->
        <!--<link href="assets/css/bootstrap.min.css" rel="stylesheet">-->
        <link rel="stylesheet" href="{{ URL::to('main-web-css/bootstrap.min.css') }}">

        <!--== font-awesome ==-->
        <!--<link href="assets/css/font-awesome.min.css" rel="stylesheet">-->
        {{--<link rel="stylesheet" href="{{ URL::to('main-web-fonts/font-awesome.min.css') }}">--}}
        <link rel="stylesheet" href="{{ URL::to('font-awesome-4.3.0/css/font-awesome.min.css') }}">

        <!--== magnific-popup ==-->
        <!--<link href="assets/css/magnific-popup.css" rel="stylesheet">-->
        <link rel="stylesheet" href="{{ URL::to('main-web-css/magnific-popup.css') }}">

        <!--== owl carousel ==-->
        <!--<link href="assets/css/owl.carousel.css" rel="stylesheet">-->
        <link rel="stylesheet" href="{{ URL::to('main-web-css/owl.carousel.css') }}">

        <!--== style css ==-->
        <!--<link href="style.css" rel="stylesheet">-->
        <link rel="stylesheet" href="{{ URL::to('main-web-css/style.css') }}">

        <!--== responsive css ==-->
        <!--<link href="assets/css/responsive.css" rel="stylesheet">-->
        <link rel="stylesheet" href="{{ URL::to('main-web-css/responsive.css') }}">

        <!--== jQuery ==-->
        <script src="main-web-js/jquery-2.1.4.min.js"></script>

        <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        @yield('style-sheet')
    </head>
    <body>

        @include('index.master.preloader')
        @include('index.master.header')
        @yield('content')

    </body>

    <!--== plugins js ==-->
    <script src="{{ URL::to('main-web-js/plugins.js') }}"></script>

    <!--== typed js ==-->
    <script src="{{ URL::to('main-web-js/typed.js') }}"></script>

    <!--== stellar js ==-->
    <script src="{{ URL::to('main-web-js/jquery.stellar.min.js') }}"></script>

    <!--== magnific-popup-options js ==-->
    <script src="{{ URL::to('main-web-js/magnific-popup-options.js') }}"></script>

    <!--== counterup js ==-->
    <script src="{{ URL::to('main-web-js/jquery.counterup.min.js') }}"></script>

    <!--== waypoints js ==-->
    <script src="{{ URL::to('main-web-js/jquery.waypoints.min.js') }}"></script>

    <!--== validator js ==-->
    <script src="{{ URL::to('main-web-js/validator.min.js') }}"></script>

    <!--== mixitup js ==-->
    <script src="{{ URL::to('main-web-js/jquery.mixitup.js') }}"></script>


    <!--== contact js ==-->
    <script src="{{ URL::to('main-web-js/contact.js') }}"></script>

    <!--== gmap3 js ==-->
    <script src="{{ URL::to('main-web-js/gmap3.min.js') }}"></script>

    <!--== custom google map js ==-->
    <script src="{{ URL::to('main-web-js/custom-google-map.js') }}"></script>

    <!-- google map api js -->
    <script type="text/javascript"
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmPkfTPQOB5ZHqTVOMYRDmcKOgRLTClkU&amp;region=US"></script>

    <!--== main js ==-->
    <script src="{{ URL::to('main-web-js/main.js') }}"></script>
    @yield('scripts')
</html>

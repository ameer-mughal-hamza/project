<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mhbthemes.com/demos/rx/rx/single-blog.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 12:18:43 GMT -->
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
    <link rel="shortcut icon" href="{{ URL::to('main-web-img/favicon.png') }}" type="image/png">

    <!--== bootstrap ==-->
    <link href="{{ URL::to('main-web-css/bootstrap.min.css') }}" rel="stylesheet">

    <!--== font-awesome ==-->
    <link href="assets/css/" rel="stylesheet">
    <link href="{{ URL::to('font-awesome-4.3.0/css/font-awesome.min.css') }}" rel="stylesheet">

    <!--== style css ==-->
    <link href="{{ URL::to('main-web-css/style.css') }}" rel="stylesheet">

    <!--== responsive css ==-->
    <link href="{{ URL::to('main-web-css/responsive.css') }}" rel="stylesheet">

    <!--== jQuery ==-->
    <script src="{{ URL::to('main-web-js/jquery-2.1.4.min.js') }}"></script>


    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

@include('index.master.preloader')

<!--===== HEADER AREA =====-->
<header class="navbar custom-navbar navbar-fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="logo">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <a href="{{ route('home') }}">Sickbay</a> <!--== logo ==-->
                </div>
            </div>

            <div class="col-md-9 col-sm-8 col-xs-12">
                <nav class="main-menu">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav"> <!--== manin menu ==-->
                            {{--<li class="active"><a class="smoth-scroll theme-color" href="#home">Home</a></li>--}}
                            {{--<li><a class="smoth-scroll" href="#about">About</a></li>--}}
                            {{--<li><a class="smoth-scroll" href="#services">service</a></li>--}}
                            {{--<li><a class="smoth-scroll" href="#work">work</a></li>--}}
                            {{--<li><a class="smoth-scroll" href="#contact">contact</a></li>--}}
                            {{--<li><a class="smoth-scroll" href="blog.html">blog</a></li>--}}
                        </ul>
                    </div>
                </nav>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</header>
<!--===== END HEADER AREA ======-->


<!--===== BREADCROUMB AREA =====-->
<div class="breadcroumb-area" data-stellar-background-ratio="0.6"
     style="background-image: url(assets/img/blog-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>My Blog</h1>
                <div class="breadcroumb">
                    <a href="http://mhbthemes.com/demos/rx/index.html">Home</a>
                    >
                    <span class="current">Blog</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="single-blog-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="col-md-4">
                    <div style="border-radius: 50%;">
                        <img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"
                             style=" height:200px; width: 200px; border-radius: 50%;">
                    </div>
                </div>
                <div class="doctor-professional-profile col-md-8">
                    <h4 class="doc-profile-name">Dr. {{ $doctors->first_name }}</h4>
                    <h5 class="doc-complete-edu">{{ $doctors->education }}</h5>
                    <h6 class="doc-specialization">{{ $doctors->category }}</h6>
                    @if($doctors->pmdc_verified == 0)
                        <h5 class="verified">
                            <i class="fa fa-check-square-o"></i> PMDC Verified</h5>
                    @endif
                </div>
            </div>
            <div class="col-md-4 doc-info-card">
                <div class="profile-info-item">
                    <p><a href=""><i class="fa fa-heart"></i></a><span class="lbl-info"> Favourite</span></p>
                </div>
                <div class="profile-info-item">
                    <p><a href=""><i class="fa fa-thumbs-up"></i></a><span
                                style="font-size: 22px; font-weight: 700;"> 3</span><span class="lbl-info"> Recommendations</span>
                    </p>
                </div>
                <div class="profile-info-item">
                    <p><a href=""><i class="fa fa-star-o"></i></a><span> 21</span><span class="lbl-info"> Years of Experience</span>
                    </p>
                </div>
                <div class="profile-info-item">
                    <p><a href=""><i class="fa fa-binoculars"></i></a><span> 636</span><span class="lbl-info"> Profile Views</span>
                    </p>
                </div>
                <div class="profile-info-item">
                    <p><a href=""><i class="fa fa-money"></i></a><span class="lbl-info"> Fee: {{ $doctors->fee }}</span>
                    </p>
                </div>
                <div class="profile-info-item">
                    <p><a href=""><i class="fa fa-star-half-o"></i></a><span class="lbl-info"> Reviews</span></p>
                </div>
            </div>
            <div class="col-md-8">
                <div style="margin-bottom: 15px;/*margin-top: -48px;*/">
                    <a href="" class="profile-buttons btn btn-danger">BOOK APPOINTMENT</a>
                    <a href="" class="profile-buttons btn btn-danger">BOOK APPOINTMENT</a>
                    <a href="" class="profile-buttons btn btn-danger">BOOK APPOINTMENT</a>
                </div>
            </div>
        </div>
        <div class="profile-about col-md-12">
            <div class="row clearfix">
                <div class="col-md-12">
                    <h2>
                        <i class="fa fa-user" style="margin-right: 10px;" aria-hidden="true"></i>
                        <span class="section-title">About Dr. {{ $doctors->first_name }}</span>
                    </h2>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-md-12">
                    <p>
                        {{ $doctors->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-9">
            <div class="profile-education">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> Eduacation</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="defaultShowEducation">
                            <ul>
                                @foreach($doctorsEducation as $edu)
                                    <li>
                                        <span>{{ $edu }}</span>
                                        <br>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile-specialization">
                <div class="row">
                    <div class="col-md-12">
                        <h2><i class="fa fa-star-half-full"></i> Specialization</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="defaultShowSpec">
                            <ul>
                                <li>
                                    <span>BDC</span>
                                    <br>
                                </li>
                                <li>
                                    <span>BDC</span>
                                    <br>
                                </li>
                                <li>
                                    <span>BDC</span>
                                    <br>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="similar-doctors">
                <div class="similar-doctor">
                    <div class="row similar-doc-row">
                        <div class="col-md-12 similar-doc-col">
                            <h2>
                                <i class="fa fa-stethoscope"></i>
                                Similar Doctors
                            </h2>
                        </div>
                    </div>
                    <div class="similar-doctor-list">
                        <div class="row">
                            @foreach($similarDoctors as $similar)
                                <div class="col-md-3">
                                    <div class="similar-doctor-data">
                                        <div style="text-align: center;">
                                            <img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"
                                                 style="height:160px; width: 160px; border-radius: 50%;"
                                                 class="search-doc-dp">
                                        </div>
                                        <h2>{{ $similar->first_name }}</h2>
                                        <h4>{{ $similar->education }}</h4>
                                        <h3>{{ $similar->category }}</h3>
                                        <a href="" class="btn btn-success">View Profile</a>
                                    </div>
                                </div>
                            @endforeach
                            {{--<div class="col-md-3">--}}
                            {{--<div class="similar-doctor-data">--}}
                            {{--<div style="text-align: center;">--}}
                            {{--<img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"--}}
                            {{--style="height:160px; width: 160px; border-radius: 50%;"--}}
                            {{--class="search-doc-dp">--}}
                            {{--</div>--}}
                            {{--<h2>Ameer Hamza</h2>--}}
                            {{--<h4>BDS BDS BDS</h4>--}}
                            {{--<h3>Dentist</h3>--}}
                            {{--<a href="" class="btn btn-success">View Profile</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                            {{--<div class="similar-doctor-data">--}}
                            {{--<div style="text-align: center;">--}}
                            {{--<img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"--}}
                            {{--style="height:160px; width: 160px; border-radius: 50%;"--}}
                            {{--class="search-doc-dp">--}}
                            {{--</div>--}}
                            {{--<h2>Ameer Hamza</h2>--}}
                            {{--<h4>BDS BDS BDS</h4>--}}
                            {{--<h3>Dentist</h3>--}}
                            {{--<a href="" class="btn btn-success">View Profile</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="col-md-3">--}}
                            {{--<div class="similar-doctor-data">--}}
                            {{--<div style="text-align: center;">--}}
                            {{--<img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"--}}
                            {{--style="height:160px; width: 160px; border-radius: 50%;"--}}
                            {{--class="search-doc-dp">--}}
                            {{--</div>--}}
                            {{--<h2>Ameer Hamza</h2>--}}
                            {{--<h4>BDS BDS BDS</h4>--}}
                            {{--<h3>Dentist</h3>--}}
                            {{--<a href="" class="btn btn-success">View Profile</a>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!--===== END BLOG POST AREA =====-->

<!--====== FOOTER AREA ======-->
<footer class="footer">
    <div class="container">
        <div class="row wow zoomIn" data-wow-delay="0.4s">
            <div class="col-md-12 text-center">
                <ul class="social-link">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                </ul>
                <p>&copy;2017 <strong>Ameer Hamza</strong>. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!--====== END FOOTER AREA ======-->

</body>

<!--== plugins js ==-->
<script src="{{ URL::to('main-web-js/plugins.js') }}"></script>

<!--== stellar js ==-->
<script src="{{ URL::to('main-web-js/jquery.stellar.min.js') }}"></script>

<!--== main js ==-->
<script src="{{ URL::to('main-web-js/main.js') }}"></script>

<!-- Mirrored from mhbthemes.com/demos/rx/rx/single-blog.blade.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 12:18:45 GMT -->
</html>

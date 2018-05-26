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

<!--===== Preloader ====-->
@include('index.master.preloader')

<!--===== BREADCROUMB AREA =====-->
<div class="breadcroumb-area" data-stellar-background-ratio="0.6"
     style="background-image: url(main-web-img/blog-bg.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{ $category->name }}</h1>
                <div class="breadcroumb">
                    <a href="">Home</a>
                    >
                    <span class="current">{{ $category->name }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--===== SINGLE POST AREA =====-->
<div class="single-blog-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="single-post-details">
                    <h2>{{ $category->name }}</h2>
                    <div class="entry-content">
                        <p>{{ $category->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="widget recent-post"> <!-- widget single -->
                    <h3 class="widget-title">Other Departments</h3>
                    <ul>
                        @foreach($otherDepartments as $department)
                            <li><a href="{{ route('service-page', [$department->name]) }}">{{ $department->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="similar-doctors">
            <div class="similar-doctor">
                <div class="row similar-doc-row">
                    <div class="col-md-12 similar-doc-col">
                        <h2>
                            <i class="fa fa-stethoscope"></i>
                            Doctors
                        </h2>
                    </div>
                </div>
                <div class="similar-doctor-list">
                    <div class="row">
                        @foreach($doctors as $doctor)
                            <div class="col-md-3">
                                <div class="similar-doctor-data">
                                    <div style="text-align: center;">
                                        <img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"
                                             style="height:160px; width: 160px; border-radius: 50%;"
                                             class="search-doc-dp">
                                    </div>
                                    <h2>{{ $doctor->first_name }}</h2>
                                    <h4>{{ $doctor->education }}</h4>
                                    <h3>{{ $doctor->category }}</h3>
                                    <a href="{{ route('view-doctor-on-main-web', ['id' => $doctor->id]) }}"
                                       class="btn">View Profile</a>
                                </div>
                            </div>
                        @endforeach
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

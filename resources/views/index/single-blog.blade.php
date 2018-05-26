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
                <h1>Single blog</h1>
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
                    <div class="post-featured-content">
                        <img src="{{ URL::to('main-web-img/blog/blog1.jpg') }}" class="img-responsive" alt="">
                    </div>
                    <h2>How to creat your own website</h2>
                    <div class="entry-meta">
                        <span class="posted-on">Posted on: <a href="#">22 August 2016 </a></span>
                        <span class="posted-by"> by: <a href="#">John Doe</a></span>
                    </div>
                    <div class="entry-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                        <blockquote>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                            Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book.It is a long
                            established fact that a reader will be distracted by the readable content of a page when
                            looking at its layout.
                        </blockquote>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="widget recent-post"> <!-- widget single -->
                    <h3 class="widget-title">Recent Posts</h3>
                    <ul>
                        <li><a href="#">Perspiciatis voluptatum fugit voluptate expedita
                                repellat<span>21st Nov, 2016</span></a></li>
                        <li><a href="#">Perspiciatis voluptatum fugit voluptate expedita
                                repellat<span>21st Nov, 2016</span></a></li>
                        <li><a href="#">Perspiciatis voluptatum fugit voluptate expedita
                                repellat<span>21st Nov, 2016</span></a></li>
                        <li><a href="#">Perspiciatis voluptatum fugit voluptate expedita
                                repellat<span>21st Nov, 2016</span></a></li>
                    </ul>
                </div>

                <div class="widget category"> <!-- widget single -->
                    <h3 class="widget-title">Categories</h3>
                    <ul>
                        <li><a href="#">Web Design <span>(5)</span></a></li>
                        <li><a href="#">Development <span>(17)</span></a></li>
                        <li><a href="#">Graphics Design <span>(25)</span></a></li>
                        <li><a href="#">WordPress <span>(24)</span></a></li>
                        <li><a href="#">Technology <span>(8)</span></a></li>
                    </ul>
                </div>

                <div class="widget tags"> <!-- widget single -->
                    <h3 class="widget-title">tags</h3>
                    <ul>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Tecnology</a></li>
                        <li><a href="#">Tends</a></li>
                        <li><a href="#">html</a></li>
                        <li><a href="#">wordpress</a></li>
                        <li><a href="#">java</a></li>
                        <li><a href="#">c++</a></li>
                        <li><a href="#">jquery</a></li>
                        <li><a href="#">business</a></li>
                        <li><a href="#">jumla</a></li>
                        <li><a href="#">envato</a></li>
                    </ul>
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

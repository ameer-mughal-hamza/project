<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from mhbthemes.com/demos/rx/rx/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 12:18:35 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rx is a Personal Portfolio Template">
    <meta name="keywords"
          content="mhbthemes, resume, cv, portfolio, personal, developer, designer,personal resume, onepage, clean, modern">
    <meta name="author" content="Alex Smith">

    <title>Rx - Personal Portfolio Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ URL::to('main-web-img/favicon.png') }}" type="image/png">

    <!--== bootstrap ==-->
    <link href="{{ URL::to('main-web-css/bootstrap.min.css') }}" rel="stylesheet">

    <!--== font-awesome ==-->
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
<div class="preloader">
    <div class="spinner">
        <div class="rect1"></div>
        <div class="rect2"></div>
        <div class="rect3"></div>
        <div class="rect4"></div>
        <div class="rect5"></div>
    </div>
</div>


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
                    <a href="http://mhbthemes.com/demos/rx/index.html">Rx.</a> <!--== logo ==-->
                </div>
            </div>

            <div class="col-md-9 col-sm-8 col-xs-12">
                <nav class="main-menu">
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav"> <!--== manin menu ==-->
                            <li class="active"><a class="smoth-scroll theme-color" href="#home">Home</a></li>
                            <li><a class="smoth-scroll" href="#about">About</a></li>
                            <li><a class="smoth-scroll" href="#services">service</a></li>
                            <li><a class="smoth-scroll" href="#work">work</a></li>
                            <li><a class="smoth-scroll" href="#contact">contact</a></li>
                            <li><a class="smoth-scroll" href="blog.html">blog</a></li>
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

<!--===== BLOG POST AREA =====-->
<div class="blog-content-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="single-post"> <!-- single post -->
                    <div class="post-featured-content">
                        <img src="assets/img/blog/blog1.jpg" class="img-responsive" alt="">
                    </div>
                    <h2>How to creat your own website</h2>
                    <div class="entry-meta">
                        <span class="posted-on"><b>Posted on:</b> <a href="#">22 August 2016</a></span>
                    </div>
                    <div class="entry-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries</p>
                        <a href="single-blog.html" class="read-more-btn">read more</a>
                    </div>
                    <footer class="entry-footer">
                        <span class="cat-links"><b>Posted in:</b> <a href="#">Design</a>, <a
                                    href="#">Development</a></span>
                        <span class="comments-link"><a href="#">2 comments</a></span>
                    </footer>
                </div>

                <div class="single-post"> <!-- single post -->
                    <div class="post-featured-content">
                        <img src="assets/img/blog/blog2.jpg" class="img-responsive" alt="">
                    </div>
                    <h2>How to creat your own website</h2>
                    <div class="entry-meta">
                        <span class="posted-on"><b>Posted on:</b> <a href="#">22 August 2016</a></span>
                    </div>
                    <div class="entry-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries</p>
                        <a href="single-blog.html" class="read-more-btn">read more</a>
                    </div>
                    <footer class="entry-footer">
                        <span class="cat-links"><b>Posted in:</b> <a href="#">Design</a>, <a
                                    href="#">Development</a></span>
                        <span class="comments-link"><a href="#">5 comments</a></span>
                    </footer>
                </div>

                <div class="single-post"> <!-- single post -->
                    <div class="post-featured-content">
                        <img src="assets/img/blog/blog3.jpg" class="img-responsive" alt="">
                    </div>
                    <h2>How to creat your own website</h2>
                    <div class="entry-meta">
                        <span class="posted-on"><b>Posted on:</b> <a href="#">22 August 2016</a></span>
                    </div>
                    <div class="entry-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                            galley of type and scrambled it to make a type specimen book. It has survived not only five
                            centuries</p>
                        <a href="single-blog.html" class="read-more-btn">read more</a>
                    </div>
                    <footer class="entry-footer">
                        <span class="cat-links"><b>Posted in:</b> <a href="#">Design</a>, <a
                                    href="#">Development</a></span>
                        <span class="comments-link"><a href="#">2 comments</a></span>
                    </footer>
                </div>


                <div class="pagination"> <!-- single post -->
                    <ul>
                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" aria-label="Next">
                                <i class="fa fa-angle-right"></i>
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="widget search"> <!-- widget single -->
                    <form class="search-form">
                        <input type="search" placeholder="Type to search here...">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>

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
                <p>&copy;2017 <strong>Alex Smith</strong>. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
<!--====== END FOOTER AREA ======-->


<!--== plugins js ==-->
<script src="{{ URL::to('main-web-js/plugins.js') }}"></script>

<!--== stellar js ==-->
<script src="{{ URL::to('main-web-js/jquery.stellar.min.js') }}"></script>

<!--== main js ==-->
<script src="{{ URL::to('main-web-js/main.js') }}"></script>
</body>

<!-- Mirrored from mhbthemes.com/demos/rx/rx/blog.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Mar 2018 12:18:37 GMT -->
</html>

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
                @foreach($posts as $post)
                    <div class="single-post"> <!-- single post -->

                        <div class="post-featured-content">
                            <img src="{{ URL::to('upload-images/'.$post->image_url) }}" class="img-responsive" alt="">
                        </div>
                        <h2>{{$post->title}}</h2>
                        <div class="entry-meta">
                            <span class="posted-on"><b>Posted on:</b> <a
                                        href="#">{{ date('M j, Y', strtotime($post->created_at)) }}</a></span>
                        </div>
                        <div class="entry-content">
                            <p>{!! substr($post->content,0 , 300) !!}{{ strlen($post->content) > 300 ? "...":"" }}</p>
                            <a href="{{route('post',['id'=>$post->id])}}" class="read-more-btn">read more</a>
                        </div>
                        <footer class="entry-footer">
                        <span class="cat-links"><b>Tags:</b>
                            @foreach($post->tags as $tag)
                                <a href="#">{{ $tag->name }}</a>
                            @endforeach
                        </span>
                        </footer>
                    </div>
                @endforeach

                {{ $posts->links() }}

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
                        @foreach($recent_posts as $recent_post)
                            <li><a href="{{route('post',['id'=>$recent_post->id])}}">{{ $recent_post->title }}
                                    <span>{{ date('M j, Y', strtotime($post->created_at)) }}</span></a></li>
                        @endforeach
                    </ul>
                </div>

                {{--<div class="widget category"> <!-- widget single -->--}}
                {{--<h3 class="widget-title">Categories</h3>--}}
                {{--<ul>--}}
                {{--<li><a href="#">Web Design <span>(5)</span></a></li>--}}
                {{--<li><a href="#">Development <span>(17)</span></a></li>--}}
                {{--<li><a href="#">Graphics Design <span>(25)</span></a></li>--}}
                {{--<li><a href="#">WordPress <span>(24)</span></a></li>--}}
                {{--<li><a href="#">Technology <span>(8)</span></a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}

                <div class="widget tags"> <!-- widget single -->
                    <h3 class="widget-title">tags</h3>
                    <ul>
                        @foreach($tags as $tag)
                            <li><a href="#">{{$tag->name}}</a></li>
                        @endforeach
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

@extends('index.master.master')

@section('stylesheets')

@endsection


@section('content')
    <!--======= WELCOME AREA =======-->
    <div id="home" class="welcome-area" data-stellar-background-ratio="0.6"
         style="background-image: url(main-web-img/slider-for-index.jpg);">
        <div class="welcome-table">
            <div class="welcome-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                            <div class="welcome-text">
                                <h1><span class="element"></span></h1>
                                <p>Our goal is & has always been to provide the best healthcare possible to all of our
                                    patients.</p>
                                <!-- <a href="#" class="btn welcome-btn">Download Resume</a> -->
                            </div>
                        </div>
                    </div><!--/.row-->
                </div><!--/.container-->
            </div>
        </div>
    </div>
    <!--===== END WELCOME AREA =====-->

    <!--===== ABOUT AREA =====-->
    <div id="about" class="about-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="about-text">
                        <h4>University Of Lahore Teaching Hospital</h4>
                        <p>One of the four teaching hospitals affiliated with the UCMD, the University of Lahore
                            Teaching
                            hospital is a state of the art modern hospital with 250 bed strength.

                            Aesthetically designed, the unconventional ambience gives a sense of reassurance and
                            satisfaction to the patients, visitors and staff. Backed by the most modern equipment, the
                            highly qualified faculty and motivated staff provide a range of clinical services of
                            international standards to the patients from all walks of life. Regular seminars, research
                            and
                            CME activities provide ample opportunities to the students & the medical staff to keep
                            abreast
                            with the latest developments in the medical field.

                            Lifelong learning resource center equipped with modern audiovisual aids and facilities for
                            video
                            transmission of live surgery directly from operation theatres and two way audio
                            communication
                            has provided a new and exciting approach to learning and student teacher interaction. ‘It is
                            a
                            joy to be part of this institution’ is a regular feedback from students, faculty and
                            clinical
                            staff or other employees in any capacity.</p>

                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </div>
    <!--===== END ABOUT AREA =====-->

    <!--===== SERVICES AREA =====-->
    <div id="services" class="services-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h1>Services</h1>
                    </div>
                </div>
            </div> <!--/.row-->

            <div class="row">
                @foreach($categories as $category)
                    <a href="{{ route('service-page', [$category->name]) }}">
                        <div class="col-md-4 col-sm-6">
                            <div class="single-service">
                                <div class="single-icon">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <h3>{{ $category->name }}</h3>
                                <p>{!! substr($category->description,0 , 90) !!}{{ strlen($category->description) > 50 ? "...":"" }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div><!--/.row-->
        </div><!--/.container-->
    </div>
    <!--====== END SERVICES AREA ======-->

    <!--====== WORK AREA ======-->
    {{--<div id="work" class="work-area section-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 col-sm-12 col-xs-12">--}}
    {{--<div class="section-title">--}}
    {{--<h2>Doctor</h2>--}}
    {{--<p>Simplify your search for Doctors with our TOP picks</p>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div> <!--/.row-->--}}

    {{--<div class="row">--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="work-inner">--}}
    {{--<div class="row">--}}
    {{--<div class="doctor-block mix {{ $category->name }}">--}}
    {{--@foreach($doctors as $doctor)--}}
    {{--<a href="">--}}
    {{--<div class="col-md-4 col-sm-6">--}}
    {{--<div style="text-align: center;margin-bottom: 30px; border-bottom : solid 1px black; background: #fff;">--}}
    {{--<div style="border-radius: 50%;">--}}
    {{--<img src="{{ URL::to('main-web-img/blog-bg.jpg') }}"--}}
    {{--style=" height:180px; width: 200px; border-radius: 50%;">--}}
    {{--</div>--}}
    {{--<p>{{ $doctor->first_name }}</p>--}}
    {{--<h6>{{ $doctor->category }}</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--@endforeach--}}
    {{--</div>--}}
    {{--</div><!--/.row-->--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-6">--}}
    {{--<div class="row">--}}
    {{--@foreach($categories as $category)--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".{{ $category->name }}"></i>--}}
    {{--<h6>{{ $category->name }}</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--@endforeach--}}
    {{--<div class="col-md-4">--}}
    {{--<ul class="work-list text-center">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--<h6>ERT Specialist</h6>--}}
    {{--</div>--}}
    {{--<li class="filter theme-color" data-filter=".dentist">Dentist</li>--}}
    {{--<li class="filter theme-color" data-filter=".cardiologist">Cardiologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".webdesign">Web design</li>--}}
    {{--<li class="filter theme-color" data-filter=".gynacologist">Gynacologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".skin_specialist">Skin Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Eye Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">ENT Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Child Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Child Specialist</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".cardiologist    "></i>--}}
    {{--<h6>ERT Specialist</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--<h6>ERT Specialist</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<ul class="work-list text-center">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--<h6>ERT Specialist</h6>--}}
    {{--</div>--}}
    {{--<li class="filter theme-color" data-filter=".dentist">Dentist</li>--}}
    {{--<li class="filter theme-color" data-filter=".cardiologist">Cardiologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".webdesign">Web design</li>--}}
    {{--<li class="filter theme-color" data-filter=".gynacologist">Gynacologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".skin_specialist">Skin Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Eye Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">ENT Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Child Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Child Specialist</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--<h6>ERT Specialist</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--<h6>ERT Specialist</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<ul class="work-list text-center">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--<h6>ERT Specialist</h6>--}}
    {{--</div>--}}
    {{--<li class="filter theme-color" data-filter=".dentist">Dentist</li>--}}
    {{--<li class="filter theme-color" data-filter=".cardiologist">Cardiologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".webdesign">Web design</li>--}}
    {{--<li class="filter theme-color" data-filter=".gynacologist">Gynacologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".skin_specialist">Skin Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Eye Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">ENT Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Child Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Child Specialist</li>--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-4">--}}
    {{--<div class="doctor-search">--}}
    {{--<i class="fa fa-heart filter theme-color" data-filter=".dentist"></i>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row">--}}
    {{--<ul class="work-list text-center">--}}
    {{--<li class="filter theme-color" data-filter="all">all</li>--}}
    {{--<li class="filter theme-color" data-filter=".doctor">Ward</li>--}}
    {{--<li class="filter theme-color" data-filter=".webdesign">Web design</li>--}}
    {{--<li class="filter theme-color" data-filter=".development">Room</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Laboratory</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Pharmacy</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Lounge</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Emergency</li>--}}
    {{--</ul>--}}
    {{--</div> <!--/.row-->--}}
    {{--<div class="row">--}}
    {{--<ul class="work-list text-center">--}}
    {{--<li class="filter theme-color" data-filter="all">Dentist</li>--}}
    {{--<li class="filter theme-color" data-filter=".doctor">Cardiologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".webdesign">Web design</li>--}}
    {{--<li class="filter theme-color" data-filter=".development">Gynacologist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Skin Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Eye Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">ENT Specialist</li>--}}
    {{--<li class="filter theme-color" data-filter=".grapich">Child Specialist</li>--}}
    {{--</ul>--}}
    {{--</div>--}}

    {{--<div class="work-inner">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-4 col-sm-6 mix doctor">--}}
    {{--<div class="col-md-4 col-sm-6 mix webdesign">--}}
    {{--<div class="single-work">--}}
    {{--<a href="{{ URL::to('/main-web-img/work/1.jpg') }}" class="image-popup">--}}
    {{--<img src="{{ URL::to('/main-web-img/work/1.jpg')}}" alt="">--}}
    {{--<div class="itemHover">--}}
    {{--<div class="work-table">--}}
    {{--<div class="table-cell">--}}
    {{--<div class="hover-content">--}}
    {{--<h3>Project name</h3>--}}
    {{--<h6>Client: Demeon James</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-4 col-sm-6 mix webdesign">--}}
    {{--<div class="single-work">--}}
    {{--<a href="{{ URL::to('/main-web-img/work/2.jpg')}}" class="image-popup">--}}
    {{--<img src="{{ URL::to('/main-web-img/work/2.jpg')}}" alt="">--}}
    {{--<div class="itemHover">--}}
    {{--<div class="work-table">--}}
    {{--<div class="table-cell">--}}
    {{--<div class="hover-content">--}}
    {{--<h3>Project name</h3>--}}
    {{--<h6>Client: Demeon James</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-4 col-sm-6 mix development">--}}
    {{--<div class="single-work">--}}
    {{--<a href="{{ URL::to('/main-web-img/work/3.jpg')}}" class="image-popup">--}}
    {{--<img src="{{ URL::to('/main-web-img/work/3.jpg')}}" alt="">--}}
    {{--<div class="itemHover">--}}
    {{--<div class="work-table">--}}
    {{--<div class="table-cell">--}}
    {{--<div class="hover-content">--}}
    {{--<h3>Project name</h3>--}}
    {{--<h6>Client: Demeon James</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-4 col-sm-6 mix development">--}}
    {{--<div class="single-work">--}}
    {{--<a href="{{ URL::to('/main-web-img/work/4.jpg')}}" class="image-popup">--}}
    {{--<img src="{{ URL::to('/main-web-img/work/4.jpg')}}" alt="">--}}
    {{--<div class="itemHover">--}}
    {{--<div class="work-table">--}}
    {{--<div class="table-cell">--}}
    {{--<div class="hover-content">--}}
    {{--<h3>Project name</h3>--}}
    {{--<h6>Client: Demeon James</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-4 col-sm-6 mix grapich">--}}
    {{--<div class="single-work">--}}
    {{--<a href="{{ URL::to('/main-web-img/work/5.jpg')}}" class="image-popup">--}}
    {{--<img src="{{ URL::to('/main-web-img/work/5.jpg')}}" alt="">--}}
    {{--<div class="itemHover">--}}
    {{--<div class="work-table">--}}
    {{--<div class="table-cell">--}}
    {{--<div class="hover-content">--}}
    {{--<h3>Project name</h3>--}}
    {{--<h6>Client: Demeon James</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="col-md-4 col-sm-6 mix grapich">--}}
    {{--<div class="single-work">--}}
    {{--<a href="{{ URL::to('/main-web-img/work/6.jpg')}}" class="image-popup">--}}
    {{--<img src="{{ URL::to('/main-web-img/work/6.jpg')}}" alt="">--}}
    {{--<div class="itemHover">--}}
    {{--<div class="work-table">--}}
    {{--<div class="table-cell">--}}
    {{--<div class="hover-content">--}}
    {{--<h3>Project name</h3>--}}
    {{--<h6>Client: Demeon James</h6>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</a>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--</div><!--/.row-->--}}
    {{--</div>--}}
    {{--</div><!--/.container-->--}}
    {{--</div>--}}
    <!--====== END WORK AREA ======-->

    <!--===== STAT AREA ======-->
    {{--<div class="stat-area section-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<div class="single-stat">--}}
    {{--<i class="fa fa-heart"></i>--}}
    {{--<h2 class="counter theme-color">35</h2>--}}
    {{--<h3>Happy Clients</h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<div class="single-stat">--}}
    {{--<i class="fa fa-coffee"></i>--}}
    {{--<h2 class="counter theme-color">227</h2>--}}
    {{--<h3>Cups of tea</h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<div class="single-stat">--}}
    {{--<i class="fa fa-handshake-o"></i>--}}
    {{--<h2 class="counter theme-color">156</h2>--}}
    {{--<h3>Projects completed</h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="col-md-3 col-sm-6">--}}
    {{--<div class="single-stat">--}}
    {{--<i class="fa fa-trophy"></i>--}}
    {{--<h2 class="counter theme-color">15</h2>--}}
    {{--<h3>Award Won</h3>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div> <!--/.row -->--}}
    {{--</div> <!--/.container -->--}}
    {{--</div>--}}
    <!--===== END STAT AREA ======-->

    <!--==== TESTIMONIAL AREA =====-->
    {{--<div id="testimonial" class="testimonial-area section-padding">--}}
    {{--<div class="container">--}}
    {{--<div class="row">--}}
    {{--<div class="col-md-12 text-center">--}}
    {{--<div class="section-title">--}}
    {{--<h2>happy clients.</h2>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div> <!--/.row-->--}}

    {{--<div class="row">--}}
    {{--<div class="col-md-12">--}}
    {{--<div class="testimonial-list">--}}
    {{--<div class="single-testimonial">--}}
    {{--<div class="t-content">--}}
    {{--<p>"Lorem ipsum dolor sit amet, consectetuer adiping elit, sed diam nonummy nibh euismod--}}
    {{--tinunt ut laoreet dolore magna aliquam."</p>--}}
    {{--</div>--}}
    {{--<div class="t-name">--}}
    {{--<h3>Micheal bean</h3>--}}
    {{--Graphic Designer--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="single-testimonial">--}}
    {{--<div class="t-content">--}}
    {{--<p>"Lorem ipsum dolor sit amet, consectetuer adiping elit, sed diam nonummy nibh euismod--}}
    {{--tinunt ut laoreet dolore magna aliquam."</p>--}}
    {{--</div>--}}
    {{--<div class="t-name">--}}
    {{--<h3>Paul bean</h3>--}}
    {{--Freelancer--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="single-testimonial">--}}
    {{--<div class="t-content">--}}
    {{--<p>"Lorem ipsum dolor sit amet, consectetuer adiping elit, sed diam nonummy nibh euismod--}}
    {{--tinunt ut laoreet dolore magna aliquam."</p>--}}
    {{--</div>--}}
    {{--<div class="t-name">--}}
    {{--<h3>Joana Williums</h3>--}}
    {{--Graphic Designer--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="single-testimonial">--}}
    {{--<div class="t-content">--}}
    {{--<p>"Lorem ipsum dolor sit amet, consectetuer adiping elit, sed diam nonummy nibh euismod--}}
    {{--tinunt ut laoreet dolore magna aliquam."</p>--}}
    {{--</div>--}}
    {{--<div class="t-name">--}}
    {{--<h3>Micheal bean</h3>--}}
    {{--Freelancer--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="single-testimonial">--}}
    {{--<div class="t-content">--}}
    {{--<p>"Lorem ipsum dolor sit amet, consectetuer adiping elit, sed diam nonummy nibh euismod--}}
    {{--tinunt ut laoreet dolore magna aliquam."</p>--}}
    {{--</div>--}}
    {{--<div class="t-name">--}}
    {{--<h3>Paul bean</h3>--}}
    {{--Graphic Designer--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div> <!-- / row -->--}}
    {{--</div> <!--/.container-->--}}
    {{--</div>--}}
    <!--====END TESTIMONIAL AREA =====-->

    <!--====== BLOG AREA ========-->
    <div id="blog" class="blog-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2>latest post.</h2>
                    </div>
                </div>
            </div> <!--/.row-->

            <div class="row">
                <div class="col-sm-4">
                    <div class="single-blog">
                        <img src="assets/img/blog/blog1.jpg" class="img-responsive" alt="">
                        <div class="post-content">
                            <h3>How to creat your own website</h3>
                            <p class="blog-post-date"><b>Posted On</b> 25th Oct 2017</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry.</p>
                            <a class="read-more-btn" href="single-blog.blade.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-blog">
                        <img src="assets/img/blog/blog2.jpg" class="img-responsive" alt="">
                        <div class="post-content">
                            <h3>How to creat your own website</h3>
                            <p class="blog-post-date"><b>Posted On</b> 25th Oct 2017</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry.</p>
                            <a class="read-more-btn" href="single-blog.blade.php">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="single-blog">
                        <img src="assets/img/blog/blog3.jpg" class="img-responsive" alt="">
                        <div class="post-content">
                            <h3>How to creat your own website</h3>
                            <p class="blog-post-date"><b>Posted On</b> 25th Oct 2017</p>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum
                                has
                                been the industry.</p>
                            <a class="read-more-btn" href="single-blog.blade.php">Read More</a>
                        </div>
                    </div>
                </div>
            </div> <!--/.row -->
        </div> <!--/.container -->
    </div>
    <!--====== END BLOG AREA ========-->

    <!--====== CONTACT INFO AREA ======-->
    <div id="contact" class="contact-info-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="section-title">
                        <h2>contact.</h2>
                    </div>
                </div>
            </div> <!--/.row-->

            <div class="row">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <div class="contact-form">
                        <form id="contact-form" method="post" action="http://mhbthemes.com/demos/rx/rx/contact.php">
                            <div class="messages"></div>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_name" type="text" name="name" class="form-control"
                                                   placeholder="Name*" required="required"
                                                   data-error="Name is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input id="form_email" type="email" name="email" class="form-control"
                                                   placeholder="Email*" required="required"
                                                   data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_subject" type="text" name="subject" class="form-control"
                                                   placeholder="Subject*" required="required"
                                                   data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <textarea id="form_message" name="message" class="form-control"
                                                  placeholder="Message*" rows="7" required="required"
                                                  data-error="Please,leave us a message."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-effect btn-sent theme-color"
                                               value="Send message">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!--/.row-->

            <div class="contact-space"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 text-center wow fadeInUp" data-wow-delay="0.2s">
                            <div class="single-address">
                                <h4>Location:</h4>
                                <p>1 - Km Raiwind Road, Lahore</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="single-address">
                                <h4>Phone Number:</h4>
                                <p>(042) 111 865 865</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 text-center wow fadeInUp" data-wow-delay="0.6s">
                            <div class="single-address">
                                <h4>Email Address:</h4>
                                <p>info@uol.edu.pk</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="single-address">
                                <h4>Support:</h4>
                                <p>+92 (0) 42 7515519</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.row-->
        </div><!--/.container-->
    </div>
    <!--===== END CONTACT INFO AREA ======-->

    <!--===== GOOGLE MAP AREA ======-->
    <div class="contact-location-area">
        <div class="container-fluid">
            <div class="row">
                <div class="map"></div>
            </div> <!--/.row-->
        </div> <!--/.container-->
    </div>
    <!--===== END GOOGLE MAP AREA ======-->

    <!--====== FOOTER AREA ======-->
    @include('index.master.footer')
    <!--====== END FOOTER AREA ======-->
@endsection

@section('scripts')
@endsection

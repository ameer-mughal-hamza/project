@extends('admin.admin-layouts.admin-master')

@section('style-sheet')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('custom-css/default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('font-awesome-4.3.0/css/font-awesome.min.css') }}">
    <style>
        /*************************************

Template Name: Rx - Personal Portfolio Template
Author: mhbthemes
Version: 1.0
Design and Developed by: mhbthemes

NOTE: This is main stylesheet of the template.

****************************************/
        /*================================================
                   Table of contents
        ==================================================

        0. BASE CSS
        1. PRELOADER
        2. SECTION TITLE AND SECTION PADDING
        3. HEADER AREA
        4. WELCOME AREA
        5. ABOUT AREA
        6. SERVICES AREA
        7. WORK AREA
        8. STAT AREA
        9. TESTIMONIAL AREA
        9. BLOG AREA
        10. CONTACT INFO AREA
        11. FOOTER ARE
        11. BLOG AND SINGLE BLOG PAGE

        ====================================================
                   End table content
        ===================================================*/
        @import url('https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');

        /*================================================
                    0 BASE CSS
        ==================================================*/

        a:focus {
            outline: 0 solid
        }

        img {
            max-width: 100%;
            height: auto;
        }

        p {
            color: #444;
        }

        a:hover {
            text-decoration: none
        }

        /* Remove Chrome Input Field's Unwanted Yellow Background Color */

        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus {
            -webkit-box-shadow: 0 0 0px 1000px white inset !important;
        }

        /*================================================
                    1 PRELOADER
        ==================================================*/

        .preloader {
            position: fixed;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0;
            background-color: #fff;
            z-index: 9999999;
        }

        .preloader .spinner {
            left: 50%;
            margin-left: -20px;
            margin-top: -20px;
            position: absolute;
            top: 50%;
        }

        .spinner {
            margin: 100px auto;
            width: 50px;
            height: 40px;
            text-align: center;
            font-size: 10px;
        }

        .spinner > div {
            background-color: #333;
            height: 100%;
            width: 6px;
            display: inline-block;
            -webkit-animation: sk-stretchdelay 1.2s infinite ease-in-out;
            animation: sk-stretchdelay 1.2s infinite ease-in-out;
        }

        .spinner .rect2 {
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
        }

        .spinner .rect3 {
            -webkit-animation-delay: -1.0s;
            animation-delay: -1.0s;
        }

        .spinner .rect4 {
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
        }

        .spinner .rect5 {
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
        }

        @-webkit-keyframes sk-stretchdelay {
            0%, 40%, 100% {
                -webkit-transform: scaleY(0.4)
            }
            20% {
                -webkit-transform: scaleY(1.0)
            }
        }

        @keyframes sk-stretchdelay {
            0%, 40%, 100% {
                transform: scaleY(0.4);
                -webkit-transform: scaleY(0.4);
            }
            20% {
                transform: scaleY(1.0);
                -webkit-transform: scaleY(1.0);
            }
        }

        /*================================================
            2 SECTION TITLE AND SECTION PADDING
        ==================================================*/

        .section-title {
            margin-bottom: 80px;
            text-align: center;
        }

        .section-title h2 {
            font-size: 45px;
            margin-bottom: 5px;
            letter-spacing: 2px;
            text-transform: capitalize;
            font-weight: 900;
        }

        .section-title p {
            font-size: 14px;
            margin: 0;
        }

        .section-padding {
            padding: 80px 0;
        }

        /*================================================
                    3 HEADER AREA
        ==================================================*/

        .custom-navbar {
            border-width: 0;
            background: transparent;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
        }

        .logo a {
            color: #fff;
            display: inline-block;
            font-size: 34px;
            font-weight: 700;
            letter-spacing: 3px;
            margin-top: 26px;
            text-transform: capitalize;
            -webkit-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .logo a:focus {
            text-decoration: none;
        }

        .main-menu {
            text-transform: uppercase;
        }

        .main-menu ul.navbar-nav {
            float: right;
        }

        .main-menu ul.nav.navbar-nav li.active {
            position: relative;
        }

        .main-menu ul.nav.navbar-nav li.active a {
        }

        .main-menu ul.navbar-nav li a {
            color: #fff;
            font-weight: 500;
            font-size: 12px;
            padding: 30px 13px;
            -webkit-transition: all 0.4s ease-in-out;
            transition: all 0.4s ease-in-out;
            position: relative;
        }

        .main-menu ul.navbar-nav li a:focus {
            background: none;
        }

        .main-menu ul li:hover a {
            color: #f9f9f9;
            background: none;
        }

        .custom-navbar.top-nav-collapse .logo a {
            margin-top: 18px;
            color: #222;
        }

        .custom-navbar.top-nav-collapse .main-menu ul.navbar-nav li a {
            color: #444;
            padding: 22px 13px;
        }

        .custom-navbar.top-nav-collapse .main-menu ul.nav.navbar-nav li.active a {
            color: #727272;
        }

        .logo a span {
            display: inline-block;
            font-size: 28px;
            padding: 9px 5px 8px 7px;
        }

        .custom-navbar.top-nav-collapse {
            background: #fff;
            box-shadow: 0 0 10px #333;
            border-width: 0;
        }

        .custom-navbar.top-nav-collapse .main-menu ul.navbar-nav li.active a:after {
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        }

        /*================================================
                    4 WELCOME AREA
        ==================================================*/

        .welcome-area {
            background-size: cover;
            z-index: 1;
            position: relative;
            height: 100%;
        }

        .welcome-area:after,
        .quotes-area:after {
            position: absolute;
            content: "";
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #000;
            opacity: .6;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=70)";
            z-index: -1;
        }

        .welcome-table {
            display: table;
            width: 100%;
            height: 100%;
            text-align: center;
        }

        .welcome-cell {
            display: table-cell;
            vertical-align: middle;
        }

        .welcome-text {
        }

        .welcome-text {
            font-size: 46px;
            color: #fff;
        }

        .welcome-text h1 {
            font-size: 46px;
            font-weight: 800;
            margin-bottom: 20px;
            color: #fff;
        }

        .welcome-text p {
            color: #fff;
            font-size: 16px;
        }

        .typed-cursor,
        .element {
            display: inline;
            font-weight: 800;
            color: #fff;
        }

        .btn.welcome-btn {
            background-color: #fff;
            border: 2px solid transparent;
            /*color: #222;*/
            margin-top: 35px;
        }

        .btn.welcome-btn:hover {
            border: 2px solid #fff;
            color: #fff;
        }

        /*================================================
                    5 ABOUT AREA
        ==================================================*/

        .about-text {
            text-align: center;
        }

        .about-text h4 {
            font-size: 18px;
            font-weight: 700;
            margin-top: 0;
            text-transform: uppercase;
        }

        .about-text p {
            font-size: 16px;
            line-height: 28px;
            font-weight: 300;
        }

        .btn,
        a.btn, .btn-comment {
            border-radius: 0 !important;
            cursor: pointer;
            font-size: 12px;
            font-weight: 700 !important;
            overflow: hidden;
            padding: 14px 24px;
            letter-spacing: 1px;
            /*background-color: #222;*/
            color: #ffffff;
            text-align: center;
            text-transform: uppercase;
            border: 2px solid transparent;
            -webkit-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
        }

        btn:hover,
        a.btn:hover,
        .btn-comment:hover {
            color: #444;
            border: 2px solid #222;
            background: transparent;
        }

        .btn:focus,
        a.btn:focus {
            outline: none;
        }

        .skill {
            list-style: none;
            margin-top: 25px;
            text-align: center;
            padding: 25px 25px 15px 25px;
            border: 1px solid #ddd;
            box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.1);
        }

        .skill li {
            display: inline-block;
            padding: 3px 12px;
            margin-right: 5px;
            color: #fff;
            background-color: #222;
            margin-bottom: 10px;
            border-radius: 5px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: 0.3s;
        }

        .skill li:hover {
            border: 2px solid #222;
            background: transparent;
            color: #222;
        }

        /*================================================
                   6 SERVICES AREA
        ==================================================*/

        .services-area {
            background-color: #f7f7f7;
        }

        .single-service {
            text-align: center;
            box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.1);
            padding: 25px 20px;
            margin-bottom: 30px;
            border-radius: 5px;
            background: #fff;
            transition: all 0.3s ease-in-out;
        }

        .single-service .single-icon {
            font-size: 30px;
            height: 70px;
            width: 70px;
            margin: 0 auto 15px;
            color: #212121;
            background: rgba(0, 0, 0, 0.05);
            line-height: 70px;
            border-radius: 50%;
            transition: all 0.3s ease-in-out;
        }

        .single-service h3 {
            font-size: 20px;
            color: #2f4050;
            font-weight: 600;
            text-transform: capitalize;
            transition: all 0.3s ease-in-out;
            margin-bottom: 10px;
        }

        .single-service p {
            color: #2f4050;
        }

        .single-service:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.07);
            border-color: #212121;
            -ms-transform: translateY(-3px);
            transform: translateY(-3px);
        }

        /*.single-service:hover .single-icon{*/
        /*background-color: #212121;*/
        /*color: #fff;*/
        /*}*/

        /*================================================
                   7 WORK AREA
        ==================================================*/

        .work-inner .mix {
            display: none;
        }

        ul.work-list {
            /*list-style: outside none none;*/
            /*margin-bottom: 30px;*/
            /*padding: 0;*/
        }

        ul.work-list li {
            cursor: pointer;
            display: inline-block;
            padding: 4px 18px;
            font-size: 13px;
            text-transform: uppercase;
            background-color: #2f4050;
            border: 2px solid transparent;
            color: #fff;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            border-radius: 25px;
            margin-right: 5px;
            margin-bottom: 10px;
        }

        ul.work-list li:hover, ul.work-list li.active {
            background-color: transparent;
            border: 2px solid #1ab394;
            color: #1ab394;
        }

        /*------------------------------------------------------*/

        .doctor-professional-profile {
            padding-left: 0px;
            padding-top: 15px;
        }

        .doc-profile-name {
            font-size: 29px;
            font-weight: 400;
            font-family: Raleway, sans-serif;
            color: #0acad1;
            text-transform: capitalize;
        }

        .doc-complete-edu {
            font-size: 20px;
            color: #4a4a4a;
            font-family: Raleway, sans-serif;
            font-weight: 300;
            margin-top: 3px;
        }

        .doc-specialization {
            margin-bottom: 10px;
            color: #0acad1;
            font-family: Raleway, sans-serif;
            font-size: 20px;
            font-weight: 500;
            margin-top: 7px;
        }

        .profile-buttons {
            margin-left: 30px;
            min-width: 200px;
        }

        .verified {
            font-size: 20px;
            font-weight: 600;
            font-family: Raleway, sans-serif;
            color: #4a4a4a;
        }

        .doc-info-card {
            padding: 6px 10px;
            background: #f7f9f9;
            max-width: 245px;
            font-family: Raleway, sans-serif;
        }

        .profile-info-item {
            margin-bottom: 4px;
            position: relative;
        }

        .profile-info-item i {
            color: #00c7ce;
            font-size: 20px;
            margin-top: 6px;
        }

        .doc-info-card .profile-info-item span {
            font-size: 22px;
            font-weight: 700;
            color: #4a4a4a;
        }

        .doc-info-card .lbl-info {
            font-size: 15px !important;
            font-weight: 400 !important;
        }

        * {
            margin: 0;
            padding: 0;
        }

        .profile-about, .dprofile-about, .profile-education, .dprofile-clinics, .profile-specialization, .dprofile-map, .profile-services, .dprofile-timings, .profile-experience, .profile-others, .profile-memberships, .service-section {
            width: 100%;
            border-bottom: 1px solid #e6e6e6;
            position: relative;
            margin-bottom: 5px;
            padding-bottom: 12px;
        }

        .profile-about h2, .dprofile-about h2, .profile-education h2,
        .dprofile-clinics h2, .profile-specialization h2, .dprofile-map h2, .profile-services h2, .dprofile-timings h2,
        .profile-experience h2, .dprofile-doctors h2, .profile-others h2, .profile-memberships h2, .profile-practice-location h2,
        .similar-doctor h2, .location-detail-wrapper h2, .doctor-reviews-holder h2 {
            font-size: 22px;
            font-family: Raleway, sans-serif;
            color: #282828;
            font-weight: 400;
            background-repeat: no-repeat;
            padding-top: 5px;
            text-transform: capitalize;
        }

        .profile-about i {
            font-size: 36px;
            color: #02c9d0;
            margin-right: 5px;
            margin-left: 6px;
        }

        .profile-education i {
            font-size: 28px;
            color: #02c9d0;
            float: left;
            margin-right: 10px;
            margin-top: 2px;
        }

        .profile-about p, .dprofile-about p {
            font-size: 14px;
            font-family: Raleway, sans-serif;
            color: #4a4a4a;
            font-weight: normal;
            line-height: 25px;
            padding: 0 10px 15px 42px;
            margin-top: 10px;
        }

        /*.defaultShowEducation ul {*/
        /*list-style: none;*/
        /*margin: 7px 0 2px 15px;*/
        /*}*/

        .profile-education ul {
            list-style: none;
            margin: 7px 0 2px 15px;
        }

        .profile-specialization ul {
            list-style: none;
            margin: 7px 0 2px 15px;
        }

        .profile-education .defaultShowEducation ul li {
            background-image: url(../images/list-style-type.png);
            background-position: left 5px;
            background-repeat: no-repeat;
            float: left;
            margin-bottom: 10px !important;
            padding-left: 30px;
            width: 50%;
        }

        .profile-specialization .defaultShowSpec ul li {
            background-image: url(../images/list-style-type.png);
            background-position: left 5px;
            background-repeat: no-repeat;
            float: left;
            margin-bottom: 10px !important;
            padding-left: 30px;
            width: 50%;
        }

        .profile-specialization i {
            font-size: 29px;
            color: #02c9d0;
            margin-top: 0px;
            float: left;
            display: inline-block;
            margin-left: 7px;
            margin-right: 7px;
        }

        /*.custom-container {*/
        /*max-width: 1170px;*/
        /*margin: 0 auto;*/
        /*padding-left: 15px;*/
        /*padding-right: 15px;*/
        /*}*/

        .similar-doctor, .dprofile-doctors {
            border-bottom: none !important;
        }

        .similar-doc-col {
            margin-bottom: 12px;
        }

        .similar-doctor h2 i {
            font-size: 36px;
            color: #2f4050;
            float: left;
            margin-right: 10px;
            margin-top: -8px;
            margin-left: 15px;
        }

        .similar-doctor-list {
            margin-bottom: 25px;
        }

        .similar-doctor-data {
            margin-bottom: 25px;
            text-align: center;
        }

        .similar-doctor-data img, .hospital-doctor-data img {
            /*-webkit-mask: url(../images/frame.svg) top left / cover;*/
            width: 160px;
            height: 160px;
            margin-bottom: 10px;
        }

        .search-doc-dp, .doc-dp-image {
            /*mask: url(.seach-doc-mask);*/
            /*mask: url(../images/frame.svg) top left / cover;*/
            /*-webkit-mask: url(../images/frame.svg) top left / cover;*/
            /*-moz-mask: url(../images/frame.svg) top left / cover;*/
        }

        h2.similar-name {
        }

        .similar-doctor-data h2, .hospital-doctor-data h2 {
            font-size: 17px;
            color: #02c9d0;
            font-weight: 500;
            text-transform: capitalize !important;
            font-family: 'Raleway', sans-serif;
            background-image: none;
            padding: 0;
            text-align: center;
            margin-bottom: 10px !important;
        }

        .similar-doctor-data h4, .hospital-doctor-data h4 {
            font-size: 14px;
            height: 15px;
            overflow: hidden;
            font-family: 'Raleway', sans-serif;
        }

        .similar-doctor-data h3, .hospital-doctor-data h3 {
            text-align: center;
            font-size: 14px;
            font-family: 'Raleway', sans-serif;
            color: #20c3c8;
            margin-bottom: 8px !important;
            text-transform: capitalize !important;
        }

        .similar-doctor-data .btn-cyan-defult {
            min-width: 191px;
            margin-left: 0px;
            margin-bottom: 10px;
            font-size: 14px;
            padding-left: 6px;
            padding-right: 6px;
        }

        .section-title {
            vertical-align: 8px;
        }

        /*------------------------------------------------------------*/

        /* Doctor Search */
        .doctor-search {
            font-size: 80px;
            height: 164px;
            width: 164px;
            margin-bottom: 20px;
            text-align: center;
            padding-top: 35px;
            color: #212121;
            border: solid 1px black;
        }

        .doctor-search:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.07);
            border-color: #413bb4;
            -ms-transform: translateY(-3px);
            transform: translateY(-3px);
        }

        .doctor-block {
            height: 200px;
        }

        .single-work {
            position: relative;
            margin-bottom: 30px;
        }

        .single-work a {
            position: relative;
            overflow: hidden;
            display: block;
            box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.1);
        }

        .single-work a:focus {
            outline: 0;
        }

        .single-work img {
            width: 100%;
            height: auto;
            transition: all 0.5s ease-in-out;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;

        }

        .itemHover {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            padding-right: 20px;
            background: rgba(0, 0, 0, 0.70);
            opacity: 0;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            transition: all 0.5s ease-in-out;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;

        }

        .single-work a:hover .itemHover {
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
        }

        .single-work a:hover img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .work-table {
            display: table;
            width: 100%;
            height: 100%;
            text-align: center;

        }

        .table-cell {
            display: table-cell;
            vertical-align: middle;
        }

        .hover-content h3 {
            color: #fff;
            text-transform: capitalize;
            font-size: 18px;
            font-weight: 600;
            letter-spacing: 1px;
            text-align: center;
        }

        .hover-content h6 {
            font-size: 13px;
            text-transform: capitalize;
            font-weight: 500;
            letter-spacing: 1px;
            margin: 0;
            display: inline-block;
            padding: 4px 10px;
            background: #fff;
            color: #444;
        }

        /*===============================================
                8. STAT AREA
        ===============================================*/

        .stat-area {
            color: #333;
            background-color: #f7f7f7;
        }

        .stat-border {
            border-right: 1px dashed #fff;
        }

        .stat-border:last-child {
            border-right: 0px dashed;
        }

        .single-stat {
            text-align: center;
        }

        .single-stat i.fa {
            font-size: 20px;
            width: 55px;
            height: 55px;
            line-height: 55px;
            background: #222;
            color: #fff;
            border-radius: 50%;
            border: 2px solid transparent;
        }

        .single-stat h2 {
            font-size: 55px;
            margin-bottom: 5px;
            margin-top: 20px;
            font-weight: 900;
        }

        .single-stat h3 {
            font-size: 14px;
            font-weight: 400;
            text-transform: uppercase;
            color: #666;
            margin: 0;
        }

        /*================================================
                   9 TESTIMONIAL AREA
        ==================================================*/

        .testimonial-area {
            background-color: #fff;
        }

        .t-content {
            margin-bottom: 30px;
            font-size: 14px;
            line-height: 28px;
            background-color: #f7f7f7;
            position: relative;
            padding: 25px;
            color: #666;
        }

        .t-content::before {
            border-color: #f7f7f7 transparent transparent;
            border-style: solid;
            border-width: 20px 20px 0 0;
            bottom: -20px;
            content: "";
            height: 0;
            left: 40px;
            position: absolute;
            width: 0;
        }

        .t-name h3 {
            margin-bottom: 0px;
            text-transform: capitalize;
            font-size: 18px;
            font-weight: 600;
        }

        .testimonial-area .owl-dots {
            margin-top: 50px;
            text-align: center;
        }

        .testimonial-area .owl-dots div {
            background: #222 none repeat scroll 0 0;
            display: inline-block;
            height: 15px;
            margin-left: 7px;
            width: 15px;
            border-radius: 50%;
            border: 2px solid transparent;
        }

        .testimonial-area .owl-dots div.active {
            border: 2px solid #222;
            background: transparent;
        }

        /*================================================
            13. BLOG AREA
        ==================================================*/

        .blog-area {
            background-color: #f7f7f7;
        }

        .single-blog {
            border: 1px solid #ddd;
            box-shadow: 1px 1px 9px rgba(0, 0, 0, 0.1);
            background: #fff;
        }

        .post-content {
            padding: 20px;

        }

        .post-content h3 {
            font-size: 18px;
            font-weight: 600;
            margin-top: 10px;
            margin-bottom: 8px;
        }

        .post-content p.blog-post-date {
            font-size: 13px;
            line-height: 22px;
            margin-bottom: 10px
        }

        .post-content p {
            margin-bottom: 15px;
        }

        .read-more-btn {
            padding: 6px 18px;
            background: #293846;
            display: inline-block;
            color: #fff;
            font-size: 14px;
            border: 2px solid transparent;
            transition: 0.3s;
        }

        .read-more-btn:hover {
            border: 2px solid #293846;
            background: transparent;
            color: #222;
        }

        /*================================================
                   10 CONTACT INFO SECTION
        ==================================================*/

        .contact-info-area {

        }

        .contact-form,
        .author-adress {

        }

        .contact-form .form-group {
            margin-bottom: 16px;
        }

        .form-control {
            padding: 15px;
            height: auto;
            box-shadow: none !important;
            border: none;
            border-radius: 0;
            background: #f5f5f5;
            border-radius: 5px;
        }

        textarea.form-control {
            resize: vertical;
            height: 120px;
        }

        .form-control:focus {
            border: 0 solid;
        }

        .btn.disabled,
        .btn[disabled],
        fieldset[disabled] .btn {
            box-shadow: none;
            cursor: not-allowed;
            opacity: 1;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";

        }

        .btn.btn-effect.disabled {
            cursor: not-allowed;
        }

        .btn.btn-effect.disabled:hover {
            border: 2px solid #222;
            color: #444;
            background-color: transparent;
        }

        .contact-margin-top {
            margin-top: 50px;
        }

        .contact-space {
            background: #ddd;
            height: 1px;
            width: 100%;
            margin: 50px 0;
        }

        .single-address i.fa {
            font-size: 22px;
            height: 55px;
            line-height: 30px;
            margin-right: 20px;
            width: 55px;
            background: #222;
            color: #fff;
            border: 2px solid transparent;
            line-height: 55px;
            border-radius: 50%;
            margin: 0 auto 15px;
            transition: 0.3s;
        }

        .single-address:hover i.fa {
            border: 2px solid #222;
            background: transparent;
            color: #222;
        }

        .single-address h4 {
            margin-bottom: 10px;
            font-weight: 500;
            font-size: 16px;
        }

        .single-address p {
            font-size: 14px;
            font-weight: 300;
            margin-bottom: 3px;
        }

        .contact-margin-top {
            margin-top: 50px;
        }

        .map {
            height: 430px;
            width: 100%;
        }

        /*================================================
                   11 FOOTER SECTION
        ==================================================*/

        .footer {
            background-color: #333;
            padding: 60px 0;
        }

        .footer p {
            font-size: 16px;
            color: #fff;
            margin: 0px;
        }

        .social-link {
            list-style: outside none none;
            margin: 0 0 10px 0;
            padding: 0;
        }

        .social-link li {
            display: inline-block;
        }

        .social-link li a {
            border-radius: 50%;
            color: #222;
            display: inline-block;
            font-size: 16px;
            margin-right: 5px;
            text-align: center;
            width: 35px;
            -webkit-transition: 0.3s;
            transition: 0.3s;
            height: 35px;
            background: #fff;
            line-height: 35px;
            border: 2px solid transparent;
        }

        .social-link li a:hover {
            background: transparent;
            border: 2px solid #fff;
            color: #fff;
        }

        /*================================================
            17. BLOG AND SINGLE BLOG PAGE
        ==================================================*/

        .breadcroumb-area {
            padding: 100px 0 80px;
            position: relative;
            background-size: cover;
            background-repeat: no-repeat;
            z-index: 1;
            text-align: center;
            color: #fff;
        }

        .breadcroumb-area:before {
            background-color: #000;
            content: "";
            height: 100%;
            left: 0;
            opacity: 0.6;
            position: absolute;
            top: 0;
            width: 100%;
            z-index: -1;
        }

        .breadcroumb-area h1 {
            font-size: 46px;
            color: #fff;
            text-transform: capitalize;
            font-weight: 700;
            margin-top: 0;
        }

        .breadcroumb {
            color: #fff;
            font-size: 16px;
        }

        .breadcroumb a {
            color: #fff;
        }

        .widget {
            margin-bottom: 40px;
        }

        .widget {
            border: 1px solid #ddd;
            padding: 15px 20px;
        }

        .widget.search {
            padding: 0;
            border: 0px solid;
        }

        .search-form input[type="search"] {
            padding: 15px;
            border: 0px solid;
            background: transparent;
        }

        .search-form {
            border: 1px solid #ddd;
            width: 100%;
        }

        .search-form button[type="submit"] {
            border: 0px solid;
            background: transparent;
            float: right;
            padding: 15px;
        }

        .widget-title {
            font-size: 22px;
            margin-bottom: 20px;
            margin-top: 0;
            text-transform: capitalize;
            font-weight: 600;
        }

        .widget ul {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }

        .widget ul li {
            line-height: 22px;
        }

        .widget.category ul li, .widget.tags ul li {
            margin-bottom: 8px
        }

        .widget.recent-post ul li {
            margin-bottom: 10px;
        }

        .widget.category ul, .widget.recent-post ul {
            padding-left: 15px;
        }

        .widget.category li, .widget.recent-post li {
            position: relative;
        }

        .widget.category li:before, .widget.recent-post li:before {
            position: absolute;
            left: -15px;
            top: 0;
            font-family: fontawesome;
            content: "\f0da";
            color: #222;
            font-size: 18px;
        }

        .widget a {
            padding-bottom: 8px;
            display: block;
            transition: 0.3s;
        }

        .widget.category li a, .widget.recent-post li a {
            color: #444;
        }

        .widget.category li a:hover, .widget.recent-post li a:hover {
            color: #727272;
        }

        .widget.tags li {
            display: inline-block;
        }

        .widget.tags a {
            background-color: #222;
            border: 2px solid transparent;
            color: #fff;
            display: block;
            font-size: 13px;
            margin-right: 4px;
            padding: 6px 13px;
            transition: 0.3s;
        }

        .widget.tags a:hover {
            color: #fff;
            border: 2px solid #222;
            background-color: transparent;
            color: #444;
        }

        .widget.recent-post span {
            display: block;
            font-size: 13px;
            color: #999;
        }

        .post-featured-content {
            margin: 0;
            max-height: 400px;
            overflow: hidden;
        }

        .single-post {
            margin-bottom: 50px;
        }

        .single-post h2, .single-post-details h2 {
            margin: 20px 0 5px 0;
            font-size: 25px;
            font-weight: 600;

        }

        .entry-content {
            margin-top: 10px;
        }

        .entry-meta span {
            font-size: 13px;
            font-weight: 500;
        }

        .entry-meta span a {
            font-weight: 400;
            color: #444;
        }

        .entry-meta span.byline {
            margin-left: 0;
        }

        .entry-footer {
            margin-top: 15px;
        }

        .entry-footer span {
            font-weight: 500;
        }

        .posted-by {
            display: inline-block;
            margin-left: 3px;
        }

        .entry-footer span a {
            font-weight: 400;
            color: #444;
        }

        .entry-footer span.cat-links {
            margin-right: 15px;
        }

        .read-more-btn {
            background-color: #222;
            color: #fff;
            display: inline-block;
            border: 2px solid transparent;
            padding: 6px 18px;
            text-transform: capitalize;
        }

        .read-more-btn:hover {
            color: #444;
            background-color: transparent;
            border: 2px solid #222;
        }

        .pagination ul {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }

        .pagination li {
            display: inline-block;
        }

        .pagination li a {
            border: 2px solid transparent;
            background-color: #222;
            color: #fff;
            display: block;
            font-size: 18px;
            font-weight: 500;
            height: 35px;
            line-height: 34px;
            margin-right: 4px;
            text-align: center;
            width: 35px;
            transition: 0.3s;
        }

        .pagination {
            margin: 0;
        }

        .pagination ul li:hover a {
            border: 2px solid #222;
            background-color: transparent;
            color: #444;
        }

        .pagination ul li.active a {
            background-color: transparent;
            border: 2px solid #222;;
            color: #444;
        }

        .single-post-details blockquote {
            font-size: 14px;
            font-style: italic;
            margin-bottom: 10px;
        }

        .comments-area ul.comment-list {
            list-style: outside none none;
            margin: 0;
            padding: 0;
        }

        .row.replay-area {
            margin-left: 120px;
            margin-top: 40px;
        }

        h3.comment-title {
            margin-bottom: 30px;
            font-weight: 600;
        }

        h3.comment-form-title {
            margin-bottom: 20px;
            font-weight: 600;
        }

        .single-post-details {
            margin-bottom: 50px;
        }

        .comment-metadata h5 {
            margin-bottom: 0;
            font-weight: 600;
        }

        .comment-metadata p {
            color: #777;
            font-size: 12px;
        }

        .comment-reply-link {
            font-weight: 700;
            color: #212121;
        }

        .comment-reply-link:hover {
            color: #727272;
        }

        .comment-item {
            border-bottom: 1px solid #ddd;
            margin-bottom: 40px;
            padding-bottom: 25px;
        }

        .comment-item:last-child {
            border-bottom: 0px solid;
        }

        .comment-form-wrap .form-control {
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid #ddd;
            border-radius: 0;
            box-shadow: none;
            height: 45px;
        }

        .comment-form-wrap .form-control:focus {
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid #ddd;
        }

        .comment-form-wrap textarea.form-control {
            height: 150px;
            resize: none;
        }

        .filled-btn.btn-comment {
            border: 0 solid;
            margin-top: 10px;
        }

    </style>
@endsection

@section('content')
    <div class="container-fluid display-table">
        <div class="row display-table-row">
            <!-- side menu -->
        @include('admin.admin-partials.admin-navbar')
        <!-- main content area -->
            <div class="col-md-10 col-sm-11 display-table-cell valign-top">
                @include('admin.admin-partials.admin-header')
                <div class="col-md-8">
                    <div id="content">
                        <header class="clearfix">
                            <h2 class="page_title pull-left">POST</h2>
                            <div class="pull-right">
                                <a href="" class="btn btn-danger">Delete</a>
                                <a href="" class="btn btn-warning">Approve</a>
                            </div>
                        </header>
                        <div class="single-post-details">
                            <div class="content-inner">
                                <div class="post-featured-content">
                                    <img src="{{ URL::to('upload-images/'.$post->image_url) }}" class="img-responsive"
                                         alt=""
                                         style="height: 400px;width: 600px;">
                                </div>

                                <h2>{{ $post->title }}</h2>

                                <div class="entry-meta">
                                    <span class="posted-on">Posted on: <a
                                                href="#">{{ date('M j, Y', strtotime($post->created_at)) }} </a></span>
                                    <span class="posted-by"> by: <a href="#">{{ $doctor->first_name }}</a></span>
                                </div>

                                <div class="entry-content">
                                    <blockquote>{!! substr($post->content,0 , 150) !!}{{ strlen($post->content) > 50 ? "...":"" }}</blockquote>
                                    <p>{!! $post->content !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">

                    <div class="content-inner">
                        <div class="widget tags"> <!-- widget single -->
                            <h3 class="widget-title">tags</h3>
                            <ul>
                                @foreach($post->tags as $tag)
                                    <li><a href="">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <footer id="admin-footer" class="clearfix">
                        <div class="pull-left"><b>Copyright </b>&copy; 2015</div>
                        <div class="pull-right">admin system</div>
                    </footer>
                </div>
            </div>
        </div>
    </div>
@endsection
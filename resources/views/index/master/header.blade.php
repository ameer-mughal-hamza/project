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
                            <li class="active"><a class="smoth-scroll theme-color" href="#home">Home</a></li>
                            <li><a class="smoth-scroll" href="#about">About</a></li>
                            <li><a class="smoth-scroll" href="#services">service</a></li>
                            {{--<li><a class="smoth-scroll" href="#work">Doctor</a></li>--}}
                            <li><a class="smoth-scroll" href="#contact">contact</a></li>
                            <li><a class="smoth-scroll" href="{{ route('blog') }}">blog</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div><!--/.row-->
    </div><!--/.container-->
</header>
<!--===== END HEADER AREA ======-->
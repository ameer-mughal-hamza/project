<nav class="navbar navbar-default navbar-fixed-top cbp-af-header">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Sickbay</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? 'active' : ''}}"><a href="{{ route('home') }}">Home</a></li>
                <li class="{{ Request::is('service') ? 'active' : ''}}"><a href="{{ route('service') }}">Services</a></li>
                <li class="{{ Request::is('blog') ? 'active' : ''}}"><a href="{{ route('blog') }}">Blog</a></li>
            </ul>
        </div>
    </div>
</nav>
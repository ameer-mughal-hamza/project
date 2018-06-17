<div class="row">
    <header id="nav-header" class="clearfix">
        <div class="col-md-5">
            <nav class="navbar-default pull-left">
                <button type="button" class="navbar-toggle collapsed" data-toggle="offcanvas"
                        data-target="#side-menu">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </nav>
            <input type="text" class="hidden-sm hidden-xs" id="header-search-field"
                   placeholder="Search for something...">
        </div>
        <div class="col-md-7">
            <ul class="pull-right">
                <li class="fixed-width dropdown">
                    <a href="#" class="dropdown-toggle glyphicon glyphicon-bell" data-toggle="dropdown"></a>
                    <span class="label label-message">{{count(auth()->guard('admin')->user()->unreadNotifications)}}</span>
                    <ul class="dropdown-menu">
                        <li>
                            {{--                            {{ auth()->guard('admin')->user()->notifications }}--}}
                            @foreach(auth()->guard('admin')->user()->unreadNotifications as $notification)
                                <a href="#">{{ $notification->type }}</a>
                            @endforeach
                        </li>
                    </ul>
                </li>

                <li id="welcome" class="hidden-xs">Welcome {{ Auth::user()->name }}</li>

                {{--<li class="dropdown">--}}
                {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">--}}
                {{--<span class="glyphicon glyphicon-bell">Notification</span>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<li>1</li>--}}
                {{--</ul>--}}
                {{--<span class="dropdown-toggle glyphicon glyphicon-bell" aria-expanded="true"--}}
                {{--data-toggle="dropdown"></span>--}}
                {{--<span class="label label-warning">3</span>--}}

                {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<li><a href="">Notification</a></li>--}}
                {{--</ul>--}}
                {{--</li>--}}

                {{--<li class="fixed-width">--}}
                {{--<a href="#">--}}
                {{--<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>--}}
                {{--<span class="label label-message">3</span>--}}
                {{--</a>--}}
                {{--</li>--}}
                <li class="logout">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </header>
</div>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}">@lang('menu.brand')</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ URL::route('home') }}">Home</a></li>
                @if( ! Auth::check() )
                <li><a href="{{ URL::route('login') }}">Login</a></li>
                <li><a href="{{ URL::route('register') }}">Register</a></li>
                @else
                <li><a href="{{ URL::route('logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
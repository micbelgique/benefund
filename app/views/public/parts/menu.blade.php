<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('home') }}"><img src="{{ asset('assets/images/logo_benefund-01.png') }}" alt="" height="40px"></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ URL::route('home') }}">@lang('menu.home')</a></li>
                @if( Auth::check() )
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <strong>@lang('menu.campaigns.dropdown')</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('public.campaigns.new') }}">@lang('menu.campaigns.new')</a></li>
                        <li><a href="{{ URL::route('public.campaigns.manage') }}">@lang('menu.campaigns.manage')</a></li>
                    </ul>
                </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if( Auth::check() )
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span> 
                        <strong>@lang('menu.profile')</strong>
                        <span class="glyphicon glyphicon-chevron-down"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            {{ Auth::user()->get_avatar_url() ? '<img src="' . Auth::user()->get_avatar_url() . '" alt="' . Lang::get('user.avatar') . '" class="img-circle">' : '<span class="glyphicon glyphicon-user icon-size"></span>' }}
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</strong></p>
                                        <p class="text-left small">{{ Auth::user()->email }}</p>
                                        <p class="text-left">
                                            <a href="{{ URL::route('profile') }}" class="btn btn-primary btn-block btn-sm">@lang('menu.edit_profile')</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="{{ URL::route('logout') }}" class="btn btn-danger btn-block">@lang('menu.logout')</a>
                                        </p>
                                        @if( Auth::user()->role()->first()->name_tag == 'admin' )
                                        <p>
                                            <a href="{{ URL::route('admin.home') }}" class="btn btn-info btn-block">@lang('menu.administration')</a>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                @else
                <li><a href="{{ URL::route('login') }}">@lang('menu.login')</a></li>
                <li><a href="{{ URL::route('register') }}">@lang('menu.register')</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::route('admin.home') }}">@lang('admin/menu.brand')</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li {{ $route_parent == 'admin/home' ? 'class="active"' : '' }}><a href="{{ URL::route('admin.home') }}">@lang('admin/menu.home')</a></li>
                <li class="dropdown {{ $route_parent == 'admin/pages' ? 'active' : '' }}">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="{{ URL::route('admin.pages') }}">@lang('admin/menu.pages') <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ URL::route('admin.pages') }}">@lang('admin/menu.pages.list')</a></li>
                        <li><a href="{{ URL::route('admin.pages.new') }}">@lang('admin/menu.pages.new')</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
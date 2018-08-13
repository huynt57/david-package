<header class="main-header">
    <a href="/home" class="logo">
        <span class="logo-mini"><b>CMS</b></span>
        <span class="logo-lg"><b>Lara</b>CMS</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        @if($authUser->unreadNotifications->count())
                            <span class="label label-warning">{{ $authUser->unreadNotifications->count() }}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">{{ __('davidbase.header.notifications', ['count' => $authUser->unreadNotifications->count()]) }}</li>
                        <li>
                            <ul class="menu">
                                @foreach($authUser->unreadNotifications as $notification)
                                    <li>
                                        <a href="{{ route('notifications.show', $notification) }}">
                                            {{ $notification->data['message'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer"><a href="{{ route('notifications.index') }}">{{ __('davidbase.header.button') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ $authUser->avatar }}" class="user-image avatar">
                        <span class="hidden-xs">{{ $authUser->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ $authUser->avatar }}" class="img-circle avatar">
                            <p>
                                {{ $authUser->name }}
                                <small>{{ $authUser->email }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('profile') }}" class="btn btn-default btn-flat">
                                    {{ __('davidbase.header.profile') }}
                                </a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout.confirm') }}" class="btn btn-default btn-flat" data-toggle="modal" data-target="#remoteModal">
                                    {{ __('davidbase.header.logout') }}
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
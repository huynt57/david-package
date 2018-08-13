@component('layouts.admin')

    @slot('title')
        {{ $title }}
    @endslot

    @slot('breadcrumb')
        {{ $breadcrumb }}
    @endslot

    <div class="row">
        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle avatar" src="{{ $authUser->avatar }}" style="height: 100px">
                    <h3 class="profile-username text-center">{{ $authUser->name }}</h3>
                    <p class="text-muted text-center">{{ $authUser->email }}</p>
                </div>
            </div>
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Tác vụ</h3>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ $routeName == 'profile' ? 'active' : '' }}">
                            <a href="{{ route('profile') }}">
                                <i class="fa fa-info fa-fw"></i>
                                Hồ sơ cá nhân
                            </a>
                        </li>
                        <li class="{{ $routeName == 'password' ? 'active' : '' }}">
                            <a href="{{ route('password') }}">
                                <i class="fa fa-key fa-fw"></i>
                                Đổi mật khẩu
                            </a>
                        </li>
                        <li class="{{ $routeName == 'activity' ? 'active' : '' }}">
                            <a href="{{ route('activity') }}">
                                <i class="fa fa-history fa-fw"></i>
                                Nhật ký hoạt động
                            </a>
                        </li>
                        <li class="{{ $routeName == 'notifications.index' ? 'active' : '' }}">
                            <a href="{{ route('notifications.index') }}">
                                <i class="fa fa-bell fa-fw"></i>
                                Thông báo
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            {{ $slot }}
        </div>
    </div>

@endcomponent
@component('layouts.admin')

    @slot('title')
        {{ $user->name }}
    @endslot

    @slot('heading')
        Thành viên <small>{{ $user->name }}</small>
    @endslot

    @slot('breadcrumb')
        <li><a href="{{ route('users.index') }}">Thành viên</a></li>
        <li class="active">{{ $user->name }}</li>
    @endslot

    <div class="row">

        <div class="col-md-3">
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle avatar" src="{{ $user->avatar }}">
                    <h3 class="profile-username text-center">{{ $user->name }}</h3>
                    <p class="text-muted text-center">{{ $user->email }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @component('components.box', ['bodyClass'=>'no-padding'])
                @slot('header')
                    <h2 class="box-title">Thông tin thành viên</h2>
                    <div class="box-tools">
                        @can('update-users')
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-success">
                                <i class="fa fa-fw fa-refresh"></i>
                                Cập nhật thông tin
                            </a>
                        @endcan
                    </div>
                @endslot
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td class="text-right">Họ và tên:</td>
                        <td class="text-bold">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td class="text-right">Email:</td>
                        <td class="text-bold">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <td class="text-right">Trạng thái:</td>
                        <td class="text-bold">@include('users.status')</td>
                    </tr>
                    <tr>
                        <td class="text-right">Đăng nhập lần cuối:</td>
                        <td class="text-bold">
                            @component('components.ago', ['time'=>$user->last_login])
                            @endcomponent
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endcomponent

            @component('components.box', ['bodyClass'=>'no-padding'])
                @slot('header')
                    <h2 class="box-title">Nhật ký hoạt động</h2>
                @endslot
                @slot('footer')
                    @component('components.paginate', ['collection'=>$activities])
                    @endcomponent
                @endslot
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">HOẠT ĐỘNG</th>
                        <th class="text-center">THỜI GIAN</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td class="text-center">{{ $activity->description }}</td>
                            <td class="text-center">
                                @component('components.ago', ['time'=>$activity->created_at])
                                @endcomponent
                            </td>
                            <td class="text-center">
                                @can('manage-system')
                                    <a href="" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></a>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endcomponent
        </div>
    </div>

@endcomponent
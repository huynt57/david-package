@component('layouts.admin')

    @slot('title', $user->name)

    @slot('breadcrumb')
        <li><a href="{{ route('users.index') }}">Thành viên</a></li>
        <li><a href="{{ route('users.show', $user->getKey()) }}">{{ $user->name }}</a></li>
        <li class="active">Cập nhật dữ liệu</li>
    @endslot

    @component('users.form', ['user' => $user])
    @endcomponent

@endcomponent
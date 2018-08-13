@component('layouts.admin')
    @slot('title', 'Cập nhật vai trò')
    @slot('breadcrumb')
        <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
        <li class="active">{{ $role->name }}</li>
    @endslot

    @component('roles.form', ['role' => $role])
    @endcomponent

@endcomponent
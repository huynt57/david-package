@component('layouts.admin')
    @slot('title', 'Thêm vai trò mới')

    @slot('breadcrumb')
        <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
        <li class="active">Thêm vai trò mới</li>
    @endslot

    @component('roles.form')
    @endcomponent
@endcomponent
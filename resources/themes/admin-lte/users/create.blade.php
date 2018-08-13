@component('layouts.admin')

    @slot('title', 'Thêm thành viên mới')

    @slot('breadcrumb')
        <li><a href="{{ route('users.index') }}">Thành viên</a></li>
        <li class="active">Thêm thành viên</li>
    @endslot

    @component('users.form')
    @endcomponent

@endcomponent
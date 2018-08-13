@component('layouts.admin')
    @slot('title', 'Danh sách vai trò')
    @slot('breadcrumb')
        <li><a href="{{ route('roles.index') }}">Vai trò</a></li>
        <li class="active">Danh sách vai trò</li>
    @endslot

    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2></h2>
                    <div class="box-tools">
                        <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus-circle fa-fw"></i>
                            <span>TẠO VAI TRÒ MỚI</span>
                        </a>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px"><input type="checkbox"></th>
                            <th>TÊN VAI TRÒ</th>
                            <th>SỐ THÀNH VIÊN</th>
                            <th>SỐ QUYỀN</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(! $roles->count())
                            <tr>
                                <td colspan="5" class="text-center text-bold text-danger">
                                    CHƯA CÓ VAI TRÒ NÀO TRONG HỆ THỐNG
                                </td>
                            </tr>
                        @else
                            @foreach($roles as $role)
                                <tr>
                                    <td><input type="checkbox"></td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->users_count }}</td>
                                    <td>{{ $role->permissions_count }}</td>
                                    <td>
                                        <a href="{{ route('roles.edit', $role) }}" class="btn btn-xs btn-primary">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <button class="btn btn-xs btn-danger" onclick="deleteRole({{ $role->getKey() }})">
                                            <i class="fa fa-trash-o"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <form id="delete-role" action="" method="post">
        {{ csrf_field() }}
        {{ method_field('delete') }}
    </form>

    <script>
        function deleteRole(id) {
            if(confirm("Bạn có chắc muốn xóa vai trò này?")) {
                var form = document.getElementById("delete-role");
                form.action = '/roles/'+id;
                form.submit();
            }
        }
    </script>

@endcomponent
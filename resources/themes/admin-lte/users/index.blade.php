@component('layouts.admin')
    @slot('title')
        Danh sách thành viên
    @endslot
    @slot('breadcrumb')
        <li class="active">Thành viên</li>
    @endslot
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <form action="{{ route('users.index') }}" method="get">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" value="{{ request('email') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Họ và tên</label>
                                    <input type="text" name="name" value="{{ request('name') }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="active">Trạng thái</label>
                                    <select name="active" class="form-control">
                                        <option value="">Tất cả trạng thái</option>
                                        <option value="1" {{ request('active') === '1' ? 'selected' : '' }}>Cho phép đăng nhập</option>
                                        <option value="0" {{ request('active') === '0' ? 'selected' : '' }}>Chặn đăng nhập</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-filter fa-fw"></i>
                            <span>TÌM THÀNH VIÊN</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <button class="btn btn-sm btn-default btn-toggle" disabled>
                        <i class="fa fa-refresh fa-fw"></i>
                        <span>CẬP NHẬT TRẠNG THÁI</span>
                    </button>
                    <div class="box-tools">
                        @can('create-users')
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-success">
                                <i class="fa fa-user fa-fw"></i>
                                <span>THÊM THÀNH VIÊN</span>
                            </a>
                            <button class="btn btn-sm btn-default" data-toggle="modal" data-target="#import-modal">
                                <i class="fa fa-file-excel-o fa-fw"></i>
                                <span>NHẬP DANH SÁCH</span>
                            </button>
                        @endcan
                    </div>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-striped has-images v-middle">
                        <thead>
                        <tr>
                            <th style="width: 10px;"><input type="checkbox" class="check-all"></th>
                            <th class="text-center">THÀNH VIÊN</th>
                            <th class="text-center">TRUY CẬP</th>
                            <th class="text-center">LẦN ĐĂNG NHẬP CUỐI</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><input type="checkbox" name="users[]" form="quick-action"></td>
                                <td>
                                    <img src="{!! $user->avatar !!}" class="img-thumbnail">
                                    <a href="{!! route('users.show', $user) !!}" class="link">{!! $user->name !!}</a>
                                    <span class="user-subhead">{!! $user->email !!}</span>
                                </td>
                                <td class="text-center">
                                    @if($user->active)
                                        <span class="label label-success">Được phép</span>
                                    @else
                                        <span class="label label-danger">Bị chặn</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @component('components.ago', ['time'=>$user->last_login])
                                    @endcomponent
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('users.show', $user) }}" class="btn btn-primary btn-sm" title="Xem thông tin">
                                        <i class="fa fa-search"></i>
                                    </a>
                                    @can('update-users')
                                        <a href="{!! route('users.edit', $user) !!}" class="btn btn-info btn-sm" title="Chỉnh sửa thông tin">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="import-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('users.import') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Nhập danh sách thành viên</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="file" name="excel_file" class="form-control" required>
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Tải file mẫu</button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="overwrite">
                                    Cập nhật lại dữ liệu nếu đã tồn tại?
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">TIẾN HÀNH NHẬP</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcomponent
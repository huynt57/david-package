<form action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}" method="post">
    {{ csrf_field() }} {{ method_field(isset($user) ? 'put' : 'post') }}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">Thông tin tài khoản</h2>
                </div>
                <div class="box-body form-horizontal">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-sm-3 control-label">Họ và tên</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" value="{{ $user->name or old('name') }}" class="form-control">
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="email" class="col-sm-3 control-label">Địa chỉ Email</label>
                        <div class="col-sm-6">
                            <input type="email" name="email" value="{{ $user->email or old('email') }}" class="form-control" placeholder="user@example.com">
                            @if($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <label for="password" class="col-sm-3 control-label">Mật khẩu</label>
                        <div class="col-sm-6">
                            <input type="password" name="password" class="form-control">
                            @if($errors->has('password'))
                                <span class="help-block">{{ $errors->first('password') }}</span>
                            @elseif(isset($user))
                                <span class="help-block">Để trống nếu không muốn đổi mật khẩu.</span>
                            @endif
                        </div>
                    </div>
                    @if(isset($user))
                        <div class="form-group">
                            <label for="active" class="col-md-3 control-label">Truy cập</label>
                            <div class="col-md-9">
                                <label class="radio-inline"><input type="radio" name="active" value="1" {{ $user->active ? 'checked' : '' }}>Cho phép</label>
                                <label class="radio-inline"><input type="radio" name="active" value="0" {{ ! $user->active ? 'checked' : '' }}>Chặn</label>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="box-header with-border">
                    <h2 class="box-title">Phân quyền</h2>
                </div>
                <div class="box-body form-horizontal">
                    <div class="form-group">
                        <label for="roles" class="col-md-3 control-label">Vai trò</label>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach($roles as $role)
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="roles[]" value="{{ $role->name }}" {{ isset($user) && $user->hasRole($role->name) ? 'checked' : '' }}>
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="permissions" class="col-md-3 control-label">Quyền</label>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ isset($user) && $user->hasPermissionTo($permission->name) ? 'checked' : '' }}>
                                                @lang($permission->name)
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer form-horizontal">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-floppy-o fa-fw"></i>
                                Lưu dữ liệu thành viên
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $slot }}
</form>
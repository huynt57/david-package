<form action="{{ isset($role) ? route('roles.update', $role) : route('roles.store') }}" method="post">
    {{ csrf_field() }} {{ method_field(isset($role) ? 'put' : 'post') }}
    <div class="row">
        <div class="col-md-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h2 class="box-title">Thông tin</h2>
                </div>
                <div class="box-body form-horizontal">
                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                        <label for="name" class="col-md-3 control-label">Tên vai trò</label>
                        <div class="col-md-9">
                            <input type="text" name="name" value="{{ $role->name or old('name') }}" class="form-control" required autofocus>
                            @if($errors->has('name'))
                                <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="permissions" class="col-md-3 control-label">Phân quyền</label>
                        <div class="col-md-9">
                            <div class="row">
                                @foreach($permissions as $permission)
                                    <div class="col-md-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ isset($role) && $role->hasPermissionTo($permission->name) ? 'checked' : '' }}>
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
                                <span>LƯU DỮ LIỆU VAI TRÒ</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@component('account.master')
    @slot('title', 'Đổi mật khẩu')
    @slot('breadcrumb')
        <li class="active">Đổi mật khẩu</li>
    @endslot

    <form action="{{ route('password') }}" method="post">
        {!! csrf_field() !!}

        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title">Đổi mật khẩu cá nhân</h2>
            </div>
            <div class="box-body form-horizontal">
                <div class="form-group {!! $errors->has('current_password') ? 'has-error' : '' !!}">
                    <label for="current_password" class="col-sm-4 control-label">Mật khẩu hiện tại</label>
                    <div class="col-sm-6">
                        <input type="password" name="current_password" class="form-control" required autofocus>
                        @if($errors->has('current_password'))
                            <span class="help-block">{!! $errors->first('current_password') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {!! $errors->has('password') ? 'has-error' : '' !!}">
                    <label for="password" class="col-sm-4 control-label">Mật khẩu mới</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" class="form-control" required>
                        @if($errors->has('password'))
                            <span class="help-block">{!! $errors->first('password') !!}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="col-sm-4 control-label">Nhập lại mật khẩu</label>
                    <div class="col-sm-6">
                        <input type="password" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="box-footer form-horizontal">
                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-success"> Cập nhật mật khẩu </button>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endcomponent
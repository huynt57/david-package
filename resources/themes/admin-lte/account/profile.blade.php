@component('account.master')
    @slot('title', 'Hồ sơ cá nhân')
    @slot('breadcrumb')
        <li class="active">Hồ sơ cá nhân</li>
    @endslot

    <form action="{{ route('profile') }}" method="post">
        {{ csrf_field() }}
        <div class="box box-default">
            <div class="box-header with-border">
                <h2 class="box-title">Cập nhật hồ sơ cá nhân</h2>
            </div>
            <div class="box-body form-horizontal">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-3 control-label">Họ và tên</label>
                    <div class="col-sm-7">
                        <input type="text" name="name" value="{{ $authUser->name }}" class="form-control" required>
                        @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-7">
                        <input type="email" name="email" value="{{ $authUser->email }}" class="form-control" required>
                        @if($errors->has('email'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="box-footer form-horizontal">
                <div class="form-group">
                    <div class="col-md-9 col-md-offset-3">
                        <button type="submit" class="btn btn-success">
                            Cập nhật hồ sơ cá nhân
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endcomponent
@component('layouts.auth')
    @slot('title', 'Đặt lại mật khẩu')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.request') }}">
        {{ csrf_field() }}

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Địa chỉ Email của bạn</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Mật khẩu mới</label>
            <input id="password" type="password" class="form-control" name="password" required>
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
            <label for="password-confirm">Xác nhận mật khẩu mới</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            @if ($errors->has('password_confirmation'))
                <span class="help-block">{{ $errors->first('password_confirmation') }}</span>
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                Đặt lại mật khẩu
            </button>
        </div>

    </form>
@endcomponent

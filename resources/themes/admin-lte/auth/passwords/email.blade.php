@component('layouts.auth')
    @slot('title', 'Đặt lại mật khẩu')

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Địa chỉ Email </label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="you@example.com" required>
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Gửi Email hướng dẫn cấp lại mật khẩu</button>
        </div>
    </form>

    <p class="text-center">
        <a href="{{ route('login') }}">Quay lại đăng nhập</a>
    </p>

@endcomponent
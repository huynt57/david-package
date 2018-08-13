@component('layouts.auth')
    @slot('title', 'Đăng ký thành viên')
    <form action="{{ route('register') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label>Tên của bạn</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required autofocus>
            @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
            @if($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label>Mật khẩu</label>
            <input type="password" name="password" class="form-control" required>
            @if($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label>Nhập lại mật khẩu</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
        </div>
        <div class="form-group">
            <p class="text-center">
                Đã có tài khoản? <a href="{{ route('login') }}">Đăng nhập ngay</a>
            </p>
        </div>
    </form>
@endcomponent
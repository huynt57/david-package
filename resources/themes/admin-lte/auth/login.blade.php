@component('layouts.auth')
    @slot('title', 'Đăng nhập')

    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
            <label for="email">Địa chỉ Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required autofocus>
            @if ($errors->has('email'))
                <span class="help-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password">Mật khẩu </label> <a href="{{ route('password.request') }}" tabindex="-1">(Quên mật khẩu)</a>
            <input type="password" name="password" class="form-control" required>
            @if ($errors->has('password'))
                <span class="help-block">{{ $errors->first('password') }}</span>
            @endif
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">ĐĂNG NHẬP</button>
                </div>
            </div>
        </div>
        <div class="social-auth-links text-center">
            <p>- HOẶC -</p>
            <a href="/login/facebook" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Đăng nhập bằng Facebook</a>
            <a href="/login/google" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google"></i> Đăng nhập bằng Google</a>
        </div>
        <div class="form-group">
            <p>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a></p>
        </div>
    </form>

@endcomponent

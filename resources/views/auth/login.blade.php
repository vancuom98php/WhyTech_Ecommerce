@extends('layouts.app')

@section('title', 'Admin - Login')

@section('content')
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng nhập</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="admin_email" type="email" class="ggg @error('admin_email') is-invalid @enderror"
                    name="admin_email" value="{{ old('admin_email') }}" required autocomplete="email" autofocus
                    placeholder="Email">

                <input id="admin_password" type="password" class="ggg" name="password" required
                    autocomplete="current-password" placeholder="Password">
                @error('admin_email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <span>
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Nhớ đăng nhập') }}
                    </label>
                </span>
                @if (Route::has('password.request'))
                    <h6>
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Quên mật khẩu?') }}
                        </a>
                    </h6>
                @endif
                <div class="clearfix"></div>
                <input type="submit" value="Đăng nhập" name="login">
                <div class="form-group row" style="margin-bottom: 50px;">
                    <div class="col-md-6">
                        <a href="{{ route('admin.facebook') }}" class="btn btn-primary" style="height: 40px;">
                            <i class="auth-form__socials-icon fab fa-facebook-square" style="line-height: 25px;"></i>
                            Đăng nhập với Facebook
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('admin.google') }}" class="btn btn-danger" style="height: 40px;">
                            <i style="line-height: 25px;"><img class="btn__google-logo"
                                    src="{{ asset('public/backend/images/google-logo.png') }}" style="width:18px;"
                                    alt=""></i>
                            Đăng nhập với Google
                        </a>
                    </div>
                </div>
            </form>
            <p style="text-align: left;">Bạn chưa có tài khoản?<a href="{{ route('register') }}" class="link">Đăng ký ngay.</a></p>
        </div>
    </div>
@endsection

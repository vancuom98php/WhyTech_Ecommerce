@extends('layouts.app')

@section('title', 'Admin - Register')

@section('content')
    <div class="log-w3">
        <div class="w3layouts-main">
            <h2>Đăng ký</h2>
            @if (session()->has('notification'))
                <div class="notification" style="color: green; font-weight: bold; font-style: italic;">
                    {!! session('notification') !!}
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-box @error('name') is-invalid @enderror">
                    <i class="input-icon fas fa-user"></i>
                    <input id="admin_name" type="text" class="ggg @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tên hiển thị">
                    @error('admin_name')
                        <div class="invalid-feedback-signup" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
                <div class="input-box @error('admin_email') is-invalid @enderror">
                    <i class="input-icon fas fa-envelope"></i>
                    <input id="admin_email" type="email" class="ggg @error('admin_email') is-invalid @enderror"
                        name="admin_email" value="{{ old('admin_email') }}" required autocomplete="email" autofocus
                        placeholder="Email">
                    @error('admin_email')
                        <div class="invalid-feedback-signup" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="input-box @error('admin_phone') is-invalid @enderror">
                    <i class="input-icon fas fa-phone"></i>
                    <input id="admin_phone" type="text" class="ggg @error('admin_phone') is-invalid @enderror"
                        name="admin_phone" value="{{ old('admin_phone') }}" required autocomplete="admin_phone" autofocus
                        placeholder="Số điện thoại">
                    @error('admin_phone')
                        <div class="invalid-feedback-signup" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="input-box @error('password') is-invalid @enderror">
                    <i class="input-icon fas fa-lock"></i>
                    <input id="admin_password" type="password" class="ggg @error('password') is-invalid @enderror"
                        name="password" required autocomplete="new-password" placeholder="Mật khẩu mới">
                    <span class="eye" style="margin-top: 5px;" onclick="myFunction()">
                        <i id="hide1" class="input-icon far fa-eye"></i>
                        <i id="hide2" class="input-icon far fa-eye-slash"></i>
                    </span>
                    @error('password')
                        <div class="invalid-feedback-signup" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="input-box @error('password-confirm') is-invalid @enderror">
                    <i class="input-icon fas fa-lock"></i>
                    <input id="password_confirmation" type="password"
                        class="ggg @error('password-confirm') is-invalid @enderror" name="password_confirmation" required
                        autocomplete="password_confirmation" placeholder="Xác nhận mật khẩu">
                    <span class="eye" style="margin-top: 5px;" onclick="myFunctionReg()">
                        <i id="hide3" class="input-icon far fa-eye"></i>
                        <i id="hide4" class="input-icon far fa-eye-slash"></i>
                    </span>
                    @error('password_confirmation')
                        <div class="invalid-feedback-signup" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="clearfix"></div>
                <input type="submit" value="Đăng ký" name="register">
                <div class="form-group row">
                    <div class="col-md-6">
                        <a href="{{ url('/admin') }}" class="btn btn-success" style="height: 40px;">
                            <i class="auth-form__socials-icon fas fa-chevron-circle-left" style="line-height: 25px;"></i>
                            Quay lại
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
    @endsection

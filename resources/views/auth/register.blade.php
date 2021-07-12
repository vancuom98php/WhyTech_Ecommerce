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
                <input id="admin_name" type="text" class="ggg @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Tên hiển thị">
                @error('admin_name')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <input id="admin_email" type="email" class="ggg @error('admin_email') is-invalid @enderror" name="admin_email"
                    value="{{ old('admin_email') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('admin_email')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <input id="admin_phone" type="text" class="ggg @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Số điện thoại">
                @error('phone')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror
                <input id="admin_password" type="password" class="ggg @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password" placeholder="Mật khẩu mới">
                @error('password')
                    <div class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </div>
                @enderror

                <input id="password-confirm" type="password" class="ggg" name="password_confirmation" required
                    autocomplete="new-password" placeholder="Xác nhận mật khẩu">

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

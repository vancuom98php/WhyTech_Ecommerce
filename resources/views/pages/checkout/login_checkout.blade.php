@extends('layout')

@section('home_title', 'Checkout-Login')

@section('home_sm-12_content')

    <section id="form">
        <!--form-->
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="active">Đăng nhập</li>
                </ol>
            </div>
            <!--/breadcrums-->
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        <h2>Đăng nhập</h2>
                        <form method="POST" action="{{ route('customer.login') }}">
                            @csrf
                            <div class="input-box">
                                <input type="email" name="customer_email" value="{{ old('customer_email') }}"
                                    placeholder="Email" />
                                @if (session()->has('error_email'))
                                    <div style="color: red;">
                                        {!! session('error_email') !!}
                                    </div>
                                @endif
                            </div>
                            <div class="input-box">
                                <input type="password" name="customer_password" placeholder="Mật khẩu" />
                                @if (session()->has('error_pwd'))
                                    <div style="color: red;">
                                        {!! session('error_pwd') !!}
                                    </div>
                                @endif
                            </div>
                            {{-- <span>
                                <input type="checkbox" class="checkbox">
                                Nhớ đăng nhập
                            </span> --}}
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>
                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng ký</h2>
                        @if (session()->has('notification'))
                            <div class="alert alert-success" style="font-weight: bold;">
                                {!! session('notification') !!}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('customer.register') }}">
                            @csrf
                            <div class="input-box">
                                <input class="@error('customer_name') is-invalid  @enderror" type="text"
                                    name="customer_name" value="{{ old('customer_name') }}" placeholder="Họ và tên" />
                                @error('customer_name')
                                    <div class="invalid-input-alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="input-box">
                                <input class="@error('customer_email') is-invalid  @enderror" type="email"
                                    name="customer_email" value="{{ old('customer_email') }}" placeholder="Email" />
                                @error('customer_email')
                                    <div class="invalid-input-alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="input-box">
                                <input class="@error('customer_phone') is-invalid  @enderror" type="text"
                                    name="customer_phone" value="{{ old('customer_phone') }}"
                                    placeholder="Số điện thoại" />
                                @error('customer_phone')
                                    <div class="invalid-input-alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="input-box">
                                <input class="@error('customer_password') is-invalid  @enderror" type="password"
                                    name="customer_password" value="{{ old('customer_password') }}"
                                    placeholder="Mật khẩu" />
                                @error('customer_password')
                                    <div class="invalid-input-alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="input-box">
                                <input class="@error('customer_confirm_password') is-invalid  @enderror" type="password"
                                    name="customer_confirm_password" value="{{ old('customer_confirm_password') }}"
                                    placeholder="Xác nhận mật khẩu" />
                                @error('customer_confirm_password')
                                    <div class="invalid-input-alert" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->

@endsection

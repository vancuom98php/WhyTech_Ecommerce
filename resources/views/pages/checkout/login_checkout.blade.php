@extends('layout')

@section('home_content')

<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="breadcrumb">
                <div class="breadcrumb__wrap">
                    <ul class="breadcrumb__list">
                        <li class="has-separator">

                            <a href="{{ url('/') }}">Trang chủ</a></li>
                        <li class="is-marked">

                            <a href="{{ route('checkout.login-checkout') }}">Đăng nhập</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary">BẠN ĐÃ ĐĂNG KÝ CHƯA?</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Intro ======-->


    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row row--center">
                <div class="col-lg-6 col-md-8 u-s-m-b-30">
                    <div class="l-f-o">
                        <div class="l-f-o__pad-box">
                            <h1 class="gl-h1">TÔI LÀ KHÁCH HÀNG MỚI</h1>

                            <span class="gl-text u-s-m-b-30" style="text-align: justify">Bằng cách tạo tài khoản với cửa hàng của chúng tôi, bạn sẽ có thể thực hiện quy trình thanh toán nhanh hơn, lưu trữ địa chỉ giao hàng, xem và theo dõi đơn đặt hàng trong tài khoản của bạn và hơn thế nữa.</span>
                            <div class="u-s-m-b-15">

                                <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="{{ route('checkout.register-checkout') }}">TẠO TÀI KHOẢN MỚI</a></div>
                            <h1 class="gl-h1">ĐĂNG NHẬP</h1>

                            <span class="gl-text u-s-m-b-30">Nếu bạn đã đăng ký tài khoản với chúng tôi, bạn có thể đăng nhập.</span>
                            <form class="l-f-o__form" method="POST" action="{{ route('customer.login') }}">
                                @csrf
                                <div class="gl-s-api">
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                            <span>Đăng nhập với Facebook</span></button></div>
                                    <div class="u-s-m-b-15">

                                        <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                            <span>Đăng nhập với Google</span></button></div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <label class="gl-label" for="login-email">ĐỊA CHỈ EMAIL *</label>

                                    <input class="input-text input-text--primary-style" type="text" id="login-email" name="customer_email" value="{{ old('customer_email') }}" placeholder="NHẬP ĐỊA CHỈ EMAIL">
                                    @if (session()->has('error_email'))
                                        <div style="color: red;">
                                            {!! session('error_email') !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="u-s-m-b-30" style="position: relative;">

                                    <label class="gl-label" for="login-password">MẬT KHẨU *</label>

                                    <input id="customer_password" class="input-text input-text--primary-style" type="password" id="login-password" name="customer_password" placeholder="NHẬP MẬT KHẨU">
                                    <span class="eye" style="margin-top: 5px;" onclick="myFunction()">
                                        <i id="hide1" class="eye-icon far fa-eye"></i>
                                        <i id="hide2" class="eye-icon far fa-eye-slash"></i>
                                    </span>
                                    @if (session()->has('error_pwd'))
                                        <div style="color: red;">
                                            {!! session('error_pwd') !!}
                                        </div>
                                    @endif
                                </div>
                                <div class="gl-inline">
                                    <div class="u-s-m-b-30">

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">ĐĂNG NHẬP</button></div>
                                    <div class="u-s-m-b-30">

                                        <a class="gl-link" href="lost-password.html">Quên mật khẩu?</a></div>
                                </div>
                                <div class="u-s-m-b-30">

                                    <!--====== Check Box ======-->
                                    <div class="check-box">

                                        <input type="checkbox" id="remember-me">
                                        <div class="check-box__state check-box__state--primary">

                                            <label class="check-box__label" for="remember-me">Nhớ đăng nhập</label></div>
                                    </div>
                                    <!--====== End - Check Box ======-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 2 ======-->

@endsection

@section('scripts')
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("customer_password");
        var y = document.getElementById("hide1");
        var z = document.getElementById("hide2");
    
        if (x.type == 'password') {
            x.type = "text";
            y.style.display = "block";
            z.style.display = "none";
        } else {
            x.type = "password";
            y.style.display = "none";
            z.style.display = "block";
        }
    }
</script>

@endsection
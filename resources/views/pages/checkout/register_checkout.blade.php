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

                                        <a href="{{ route('checkout.register-checkout') }}">Đăng ký</a></li>
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
                                    <h1 class="section__heading u-c-secondary">TẠO TÀI KHOẢN MỚI</h1>
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
                            @if (session()->has('notification'))
                                <div class="alert alert-success" style="font-weight: bold;">
                                    {!! session('notification') !!}
                                </div>
                            @endif
                            <div class="col-lg-6 col-md-8 u-s-m-b-30">
                                <div class="l-f-o">
                                    <div class="l-f-o__pad-box">
                                        <h1 class="gl-h1">THÔNG TIN CÁ NHÂN</h1>
                                        <form class="l-f-o__form" method="POST" action="{{ route('customer.register') }}">
                                            @csrf
                                            <div class="gl-s-api">
                                                <div class="u-s-m-b-15">

                                                    <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                                        <span>Đăng ký với Facebook</span></button></div>
                                                <div class="u-s-m-b-30">

                                                    <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                                        <span>Đăng ký với Google</span></button></div>
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-fname">HỌ VÀ TÊN *</label>

                                                <input class="input-text input-text--primary-style @error('customer_name') is-invalid  @enderror" type="text" id="reg-fname" name="customer_name" value="{{ old('customer_name') }}" placeholder="Nhập họ và tên" required>
                                                @error('customer_name')
                                                    <div class="invalid-input-alert" role="alert">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            {{-- <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <!--====== Date of Birth Select-Box ======-->

                                                    <span class="gl-label">BIRTHDAY</span>
                                                    <div class="gl-dob"><select class="select-box select-box--primary-style">
                                                            <option selected>Month</option>
                                                            <option value="male">January</option>
                                                            <option value="male">February</option>
                                                            <option value="male">March</option>
                                                            <option value="male">April</option>
                                                        </select><select class="select-box select-box--primary-style">
                                                            <option selected>Day</option>
                                                            <option value="01">01</option>
                                                            <option value="02">02</option>
                                                            <option value="03">03</option>
                                                            <option value="04">04</option>
                                                        </select><select class="select-box select-box--primary-style">
                                                            <option selected>Year</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1994">1994</option>
                                                        </select></div>
                                                    <!--====== End - Date of Birth Select-Box ======-->
                                                </div>
                                                <div class="u-s-m-b-30">

                                                    <label class="gl-label" for="gender">GENDER</label><select class="select-box select-box--primary-style u-w-100" id="gender">
                                                        <option selected>Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="male">Female</option>
                                                    </select></div>
                                            </div> --}}
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-email">SỐ ĐIỆN THOẠI *</label>

                                                <input class="input-text input-text--primary-style @error('customer_phone') is-invalid  @enderror" type="text" id="reg-email" name="customer_phone" value="{{ old('customer_phone') }}" placeholder="Nhập số điện thoại" required>
                                                @error('customer_phone')
                                                    <div class="invalid-input-alert" role="alert">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-email">ĐỊA CHỈ EMAIL *</label>

                                                <input class="input-text input-text--primary-style @error('customer_email') is-invalid  @enderror" type="email" id="reg-email" name="customer_email" value="{{ old('customer_email') }}" placeholder="Nhập địa chỉ Email" required>
                                                @error('customer_email')
                                                    <div class="invalid-input-alert" role="alert">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-password">MẬT KHẨU *</label>

                                                <input class="input-text input-text--primary-style @error('customer_password') is-invalid  @enderror" type="password" id="reg-password" name="customer_password" placeholder="Nhập mật khẩu" required>
                                                @error('customer_password')
                                                    <div class="invalid-input-alert" role="alert">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="u-s-m-b-30">

                                                <label class="gl-label" for="reg-password">XÁC NHẬN MẬT KHẨU *</label>

                                                <input class="input-text input-text--primary-style @error('customer_confirm_password') is-invalid  @enderror" type="password" id="reg-password" name="customer_confirm_password" placeholder="Xác nhận mật khẩu" required>
                                                @error('customer_confirm_password')
                                                    <div class="invalid-input-alert" role="alert">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">ĐĂNG KÝ</button></div>

                                            <a class="gl-link" href="{{ route('home.shop') }}">QUAY LẠI MUA SẮM</a>
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

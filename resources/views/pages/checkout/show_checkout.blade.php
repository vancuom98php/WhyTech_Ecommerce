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

                                <a href="{{ url('/') }}">Trang chủ</a>
                            </li>
                            <li class="is-marked">

                                <a href="{{ route('checkout.checkout') }}">Thanh toán</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="checkout-msg-group">
                            @if (!session()->has('customer_id'))
                            <div class="msg u-s-m-b-30">

                                <span class="msg__text">Bạn là khách hàng?

                                    <a class="gl-link" href="#return-customer" data-toggle="collapse">Đăng nhập</a></span>
                                <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                    <div class="l-f u-s-m-b-16">

                                        <span class="gl-text u-s-m-b-16">Nếu bạn đã đăng ký tài khoản với chúng tôi, vui
                                            lòng đăng nhập.</span>
                                        <form class="l-f__form" method="POST" action="{{ route('customer.login') }}">
                                            @csrf
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="login-email">Địa chỉ Email *</label>

                                                    <input class="input-text input-text--primary-style" type="email"
                                                    id="login-email" name="customer_email" value="{{ old('customer_email') }}" placeholder="Nhập địa chỉ Email" required>
                                                    @if (session()->has('error_email'))
                                                        <div style="color: red;">
                                                            {!! session('error_email') !!}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="login-password">Mật khẩu *</label>

                                                    <input class="input-text input-text--primary-style" type="password" type="password" id="login-password" name="customer_password" placeholder="Nhập mật khẩu" required>
                                                    @if (session()->has('error_pwd'))
                                                        <div style="color: red;">
                                                            {!! session('error_pwd') !!}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-15">

                                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">Đăng
                                                        nhập</button>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <a class="gl-link" href="lost-password.html">Quệt mật khẩu?</a>
                                                </div>
                                            </div>

                                            <!--====== Check Box ======-->
                                            <div class="check-box">

                                                <input type="checkbox" id="remember-me">
                                                <div class="check-box__state check-box__state--primary">

                                                    <label class="check-box__label" for="remember-me">Nhớ đăng nhập</label>
                                                </div>
                                            </div>
                                            <!--====== End - Check Box ======-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="msg">
                            @endif
                            @if (session()->has('success_coupon'))
                                <div class="alert-success" style="width: 50%;">
                                    <p class="alert">{!! session('success_coupon') !!}</p>
                                </div>
                            @endif
                            @if (session()->has('error_coupon'))
                                <div class="alert-error" style="width: 50%;">
                                    <p class="alert">{!! session('error_coupon') !!}</p>
                                </div>
                            @endif
                                <span class="msg__text">Có phiếu giảm giá?

                                    <a class="gl-link" href="#have-coupon" data-toggle="collapse">Nhấn ở đây để nhập
                                        mã</a></span>
                                <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                    <div class="c-f u-s-m-b-16">

                                        <span class="gl-text u-s-m-b-16">Nhập mã phiếu giảm giá của bạn nếu bạn có.</span>
                                        <form class="c-f__form" method="POST" action="{{ route('coupon.check') }}">
                                            @csrf
                                            <div class="u-s-m-b-16">
                                                <div class="u-s-m-b-15">

                                                    <label for="coupon"></label>

                                                    <input class="input-text input-text--primary-style" type="text"
                                                        id="coupon" name="coupon" placeholder="Nhập mã giảm giá">
                                                </div>
                                                <div class="u-s-m-b-15">
                                                    <button class="btn btn--e-transparent-brand-b-2 check_coupon" type="submit">Áp dụng</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->


    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="checkout-f">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">THÔNG TIN VẬN CHUYỂN</h1>
                            <form class="checkout-f__delivery" method="POST" action="{{ route('checkout.save-checkout') }}">
                                @csrf
                                <div class="u-s-m-b-30">
                                    <div class="u-s-m-b-15">

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="get-address">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="get-address">Sử dụng địa chỉ giao hàng
                                                    và thanh toán mặc định từ tài khoản</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->
                                    </div>

                                    <!--====== First Name, Last Name ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-email">HỌ VÀ TÊN NGƯỜI NHẬN *</label>

                                        <input class="input-text input-text--primary-style @error('shipping_name') is-invalid  @enderror" type="text" id="billing-email"
                                            data-bill="" name="shipping_name" value="{{ old('shipping_name') }}" required>
                                        @error('shipping_name')
                                            <div class="invalid-input-alert" role="alert">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <!--====== End - First Name, Last Name ======-->


                                    <!--====== E-MAIL ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-email">ĐỊA CHỈ EMAIL *</label>

                                        <input class="input-text input-text--primary-style @error('shipping_email') is-invalid  @enderror" type="text" id="billing-email"
                                            data-bill=""name="shipping_email" value="{{ old('shipping_email') }}" required>
                                        @error('shipping_email')
                                            <div class="invalid-input-alert" role="alert">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror    
                                    </div>
                                    <!--====== End - E-MAIL ======-->


                                    <!--====== PHONE ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-phone">SỐ ĐIỆN THOẠI *</label>

                                        <input class="input-text input-text--primary-style @error('shipping_phone') is-invalid  @enderror" type="text" id="billing-phone"
                                            data-bill="" name="shipping_phone" value="{{ old('shipping_phone') }}" required>
                                        @error('shipping_phone')
                                            <div class="invalid-input-alert" role="alert">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    <!--====== End - PHONE ======-->


                                    <!--====== Street Address ======-->
                                    <div class="u-s-m-b-15">

                                        <label class="gl-label" for="billing-street">ĐỊA CHỈ GIAO HÀNG *</label>

                                        <input class="input-text input-text--primary-style @error('shipping_address') is-invalid  @enderror" type="text" id="billing-street"
                                            placeholder="Địa chỉ nhà giao hàng" data-bill="" name="shipping_address" value="{{ old('shipping_address') }}" required>
                                        @error('shipping_address')
                                            <div class="invalid-input-alert" role="alert">
                                                <p>{{ $message }}</p>
                                            </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="u-s-m-b-15">

                                                <label for="billing-street-optional"></label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-street-optional" placeholder="Apartment, suite unit etc. (optional)" data-bill=""></div> --}}
                                    <!--====== End - Street Address ======-->


                                    <!--====== Country ======-->
                                    {{-- <div class="u-s-m-b-15">

                                                <!--====== Select Box ======-->

                                                <label class="gl-label" for="billing-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="billing-country" data-bill="">
                                                    <option selected value="">Choose Country</option>
                                                    <option value="uae">United Arab Emirate (UAE)</option>
                                                    <option value="uk">United Kingdom (UK)</option>
                                                    <option value="us">United States (US)</option>
                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div> --}}
                                    <!--====== End - Country ======-->


                                    <!--====== Town / City ======-->
                                    {{-- <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-town-city">TOWN/CITY *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-town-city" data-bill="">
                                            </div> --}}
                                    <!--====== End - Town / City ======-->


                                    <!--====== STATE/PROVINCE ======-->
                                    {{-- <div class="u-s-m-b-15">

                                                <!--====== Select Box ======-->

                                                <label class="gl-label" for="billing-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="billing-state" data-bill="">
                                                    <option selected value="">Choose State/Province</option>
                                                    <option value="al">Alabama</option>
                                                    <option value="al">Alaska</option>
                                                    <option value="ny">New York</option>
                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div> --}}
                                    <!--====== End - STATE/PROVINCE ======-->


                                    <!--====== ZIP/POSTAL ======-->
                                    {{-- <div class="u-s-m-b-15">

                                                <label class="gl-label" for="billing-zip">ZIP/POSTAL CODE *</label>

                                                <input class="input-text input-text--primary-style" type="text" id="billing-zip" placeholder="Zip/Postal Code" data-bill="">
                                            </div> --}}
                                    <!--====== End - ZIP/POSTAL ======-->
                                    {{-- <div class="u-s-m-b-10">

                                                <!--====== Check Box ======-->
                                                <div class="check-box">

                                                    <input type="checkbox" id="make-default-address" data-bill="">
                                                    <div class="check-box__state check-box__state--primary">

                                                        <label class="check-box__label" for="make-default-address">Make default shipping and billing address</label></div>
                                                </div>
                                                <!--====== End - Check Box ======-->
                                            </div> --}}
                                    {{-- <div class="u-s-m-b-10">

                                                <a class="gl-link" href="#create-account" data-toggle="collapse">Want to create a new account?</a>
                                            </div>
                                            <div class="collapse u-s-m-b-15" id="create-account">

                                                <span class="gl-text u-s-m-b-15">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</span>
                                                <div>

                                                    <label class="gl-label" for="reg-password">Account Password *</label>

                                                    <input class="input-text input-text--primary-style" type="text" data-bill id="reg-password"></div>
                                            </div> --}}
                                    <div class="u-s-m-b-10">

                                        <label class="gl-label" for="order-note">GHI CHÚ ĐƠN HÀNG</label>
                                        <textarea
                                            class="text-area text-area--primary-style" id="order-note" name="shipping_notes"
                                            style="resize: none"></textarea>
                                    </div>
                                    <div>

                                        <button class="btn btn--e-transparent-brand-b-2" type="submit" name="send_order">LƯU THÔNG TIN</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-6">
                            <div class="div">
                                @if (session()->has('notification'))
                                    <div class="alert-success">
                                        <p class="alert">{!! session('notification') !!}</p>
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert-error">
                                        <p class="alert">{!! session('error') !!}</p>
                                    </div>
                                @endif
                            </div>
                            <h1 class="checkout-f__h1">ĐƠN HÀNG ĐÃ ĐẶT</h1>

                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    @if(session()->has('cart') && count(session()->get('cart')) > 0)
                                    @php
                                        $total = 0;
                                    @endphp
                                    <div class="o-summary__item-wrap gl-scroll">
                                        @foreach(session()->get('cart') as $item)
                                        @php
                                            $total += $item['product_quantity'] * $item['product_info']->product_price; 
                                        @endphp
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">

                                                        <img class="u-img-fluid" src="{{ asset($item['product_info']->product_image_path) }}"
                                                            alt="{{ $item['product_info']->product_name }}">
                                                    </div>
                                                    <div class="o-card__info-wrap">

                                                        <span class="o-card__name">

                                                            <a href="{{ route('product.detail', ['product_slug' => $item['product_info']->product_slug]) }}">{{ $item['product_info']->product_name }}</a></span>

                                                        <span class="o-card__quantity">Số lượng x {{ $item['product_quantity'] }}</span>

                                                        <span
                                                            class="o-card__price">{{ number_format($item['product_info']->product_price) }} VNĐ</span>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                    @else
                                    <p style="text-align: center;">Giỏ hàng trống !</p>
                                    @endif
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">PHÍ VẬN CHUYỂN VÀ HÓA ĐƠN</h1>
                                        <div class="ship-b">

                                            <span class="ship-b__text">Vận chuyển đến:</span>
                                            @if(session()->has('shipping_id'))
                                                <div class="ship-b__box u-s-m-b-10" style="display: block;">
                                                    <p class="ship-b__p">
                                                        <i>Người nhận: </i>{{ session()->get('shipping_name') }}
                                                    </p>
                                                    <p class="ship-b__p">
                                                        <i>Số điện thoại: </i>{{ session()->get('shipping_phone') }}
                                                    </p>
                                                    <p class="ship-b__p">
                                                        <i>Địa chỉ giao hàng: </i>{{ session()->get('shipping_address') }}
                                                    </p>

                                                    <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal"
                                                        data-modal-id="#edit-ship-address">Chỉnh sửa</a>
                                                </div>
                                            @else
                                                <div class="ship-b__box u-s-m-b-10" style="display: block;">
                                                    <p class="ship-b__p">
                                                        Chưa có thông tin vận chuyển.
                                                    </p>
                                                    <p style="color: #ff4500;" class="ship-b__p">
                                                        Vui lòng nhập thông tin vận chuyển bên cạnh!
                                                    </p>
                                                </div>
                                            @endif
                                            {{-- <div class="ship-b__box">

                                                <span class="ship-b__text">Bill to default billing address</span>

                                                <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal"
                                                    data-modal-id="#edit-ship-address">Edit</a>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>PHÍ VẬN CHUYỂN</td>
                                                    <td>Free</td>
                                                </tr>
                                                <tr>
                                                    <td>THUẾ</td>
                                                    <td>{{ Cart::tax() }} VNĐ</td>
                                                </tr>
                                                @if(session()->has('cart') && count(session()->get('cart')) > 0)
                                                <tr>
                                                    <td>TỔNG GIÁ TRỊ ĐƠN HÀNG</td>
                                                    <td>{{ number_format($total) }} VNĐ</td>
                                                </tr>
                                                @if (session()->has('coupon'))
                                                    <tr>
                                                        <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal"
                                                        data-modal-id="#edit-ship-address" href="{{ route('coupon.unset') }}">Xóa mã giảm giá</a>
                                                    </tr>
                                                        @foreach(session()->get('coupon') as $coupon)
                                                            @if($coupon['coupon_condition'] == 1)
                                                                @php
                                                                    $total -= $total * ($coupon['coupon_number'] / 100);
                                                                @endphp 
                                                                <tr>
                                                                    <td>ÁP DỤNG MÃ GIẢM GIÁ</td>
                                                                    <td>{{ $coupon['coupon_number'] }} %</td>
                                                                </tr>
                                                            @else
                                                                @php
                                                                    $total -= $coupon['coupon_number'];
                                                                @endphp 
                                                                <tr>
                                                                    <td>ÁP DỤNG MÃ GIẢM GIÁ</td>
                                                                    <td>{{ number_format($coupon['coupon_number']) }} VNĐ</td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                @endif
                                                <tr>
                                                    <td>THÀNH TIỀN</td>
                                                    <td>{{ number_format($total) }} VNĐ</td>
                                                </tr>
                                                @else
                                                <tr>
                                                    <td>TỔNG GIÁ TRỊ ĐƠN HÀNG</td>
                                                    <td>0 VNĐ</td>
                                                </tr>
                                                <tr>
                                                    <td>THÀNH TIỀN</td>
                                                    <td>0 VNĐ</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">HÌNH THỨC THANH TOÁN</h1>
                                        <form class="checkout-f__payment" method="POST" action="{{ route('checkout.place-order') }}">
                                            @csrf
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="cash-on-delivery" name="payment_method" value="Trực tiếp" checked>
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="cash-on-delivery">Thanh toán
                                                            khi giao hàng</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">Thanh toán tiền mặt khi nhận hàng.</span>
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="direct-bank-transfer" name="payment_method" value="ATM">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="direct-bank-transfer">Chuyển
                                                            tiền trực tiếp qua ngân hàng</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">Thực hiện thanh toán của bạn trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn đặt hàng của bạn làm tham chiếu thanh toán. Đơn đặt hàng của bạn sẽ không được chuyển cho đến khi tiền đã hết trong tài khoản của chúng tôi.</span>
                                            </div>
                                            {{-- <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="pay-with-check" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="pay-with-check">Pay With Check</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                                    </div>
                                                    <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="pay-with-card" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span>
                                                    </div>
                                                    <div class="u-s-m-b-10">

                                                        <!--====== Radio Box ======-->
                                                        <div class="radio-box">

                                                            <input type="radio" id="pay-pal" name="payment">
                                                            <div class="radio-box__state radio-box__state--primary">

                                                                <label class="radio-box__label" for="pay-pal">Pay Pal</label></div>
                                                        </div>
                                                        <!--====== End - Radio Box ======-->

                                                        <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
                                                    </div> --}}
                                            <div class="u-s-m-b-15">

                                                <!--====== Check Box ======-->
                                                <div class="check-box">

                                                    <input type="checkbox" id="term-and-condition" required>
                                                    <div class="check-box__state check-box__state--primary">

                                                        <label class="check-box__label" for="term-and-condition">Tôi đồng ý với</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Check Box ======-->

                                                <a class="gl-link">Điều khoản Dịch vụ.</a>
                                            </div>
                                            <div>
                                                <button class="btn btn--e-brand-b-2" type="submit">ĐẶT HÀNG</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->

@endsection

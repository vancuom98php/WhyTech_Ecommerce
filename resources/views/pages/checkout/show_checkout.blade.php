@extends('layout')

@section('home_title', 'Checkout')

@section('home_sm-12_content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>
            <!--/breadcrums-->

            <div class="alert alert-warning" role="alert">
                <p>Làm ơn đăng nhập trước khi thanh toán và xem lại lịch sử mua hàng</p>
            </div>
            <!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-6 clearfix">
                        <div class="bill-to">
                            <p>Thông tin gửi hàng</p>
                            <div class="form-one checkout">
                                <form method="POST" action="{{ route('checkout.save-checkout') }}">
                                    @csrf
                                    <input class="save_checkout @error('shipping_email') is-invalid  @enderror" type="email"
                                        name="shipping_email" value="{{ old('shipping_email') }}" placeholder="Email" />
                                    @error('shipping_email')
                                        <div class="invalid-input-alert" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <input class="save_checkout @error('shipping_name') is-invalid  @enderror" type="text"
                                        name="shipping_name" value="{{ old('shipping_name') }}" placeholder="Họ và tên" />
                                    @error('shipping_name')
                                        <div class="invalid-input-alert" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <input class="save_checkout @error('shipping_phone') is-invalid  @enderror" type="text"
                                        name="shipping_phone" value="{{ old('shipping_phone') }}"
                                        placeholder="Số điện thoại" />
                                    @error('shipping_phone')
                                        <div class="invalid-input-alert" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <input class="save_checkout @error('shipping_address') is-invalid  @enderror" type="text"
                                        name="shipping_address" value="{{ old('shipping_address') }}"
                                        placeholder="Địa chỉ giao hàng" />
                                    @error('shipping_address')
                                        <div class="invalid-input-alert" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    @enderror
                                    <textarea class="save_checkout" name="shipping_notes" placeholder="Ghi chú đơn hàng của bạn"
                                        rows="5"></textarea>
                                    <button type="submit" class="btn btn-primary" style="padding: 7px 70px;"
                                        name="send_order">Đặt hàng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <a href="{{ route('cart.show') }}"><h2 style="margin-bottom: 40px;">Xem lại giỏ hàng của bạn</h2></a>
            </div>

            {{-- <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div> --}}
        </div>
    </section>
    <!--/#cart_items-->

@endsection

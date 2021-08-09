@extends('layout')

@section('home_title', 'Payment')

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

            <div class="review-payment">
                <h2>Giỏ hàng của bạn</h2>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($content as $value)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{ asset($value->options->image) }}" width="80px" height="80px"
                                            alt="{{ $value->name }}" /></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $value->name }}</a></h4>
                                    <p>Web ID: 1089772</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($value->price) }} VNĐ</p>
                                </td>
                                <td class="cart_quantity">
                                    <p>{{ $value->qty }}</p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ number_format($value->price * $value->qty) }} VNĐ</p>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ Cart::subtotal() }} VNĐ</p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h4 style="margin: 40px 0; font-size: 20px;">Chọn hình thức thanh toán</h4>
            <form method="POST" action="{{ route('checkout.place-order') }}">
                @csrf
                <div class="payment-options">
                    <span>
                        <label><input id="payment_ATM" name="payment_method" value="ATM" type="radio" checked> Trả trước bằng ATM</label>
                    </span>
                    <span>
                        <label><input id="payment_live" name="payment_method" value="Trực tiếp" type="radio"> Trực tiếp khi nhận hàng</label>
                    </span>
                    <button type="submit" class="btn btn-primary" style="padding: 7px 50px; margin-top: 0px;" name="send_order">Mua hàng</button>
                </div>
            </form>
        </div>
    </section>
    <!--/#cart_items-->

@endsection

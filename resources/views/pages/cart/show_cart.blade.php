@extends('layout')

@section('home_title', 'Cart')

@section('home_content')

    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            @if (session()->has('notification'))
                <div class="alert alert-danger" style="font-weight: bold;">
                    {!! session('notification') !!}
                </div>
            @endif
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Tên sản phẩm</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
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
                                    <div class="cart_quantity_button">
                                        <form role="form" action="{{ route('cart.update-quantity') }}" method="post">
                                            @csrf
                                            <input class="cart_quantity_input" type="text" name="cart_quantity"
                                                value="{{ $value->qty }}" size="2">
                                            <input type="hidden" name="cart_rowId" value="{{ $value->rowId }}">
                                            <button type="submit" class="btn btn-default btn-sm" name="update_quantity">Update</button>
                                        </form>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ number_format($value->price * $value->qty) }} VNĐ</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ route('cart.delete', ['id' => $value->rowId]) }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                            <td class="cart_total">
                                <p class="cart_total_price">{{ Cart::subtotal() }} VNĐ</p>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!--/#cart_items-->

    <section id="do_action">
        <div class="container">
            {{-- <div class="heading">
                <h3>What would you like to do next?</h3>
                <p>Choose if you have a discount code or reward points you want to use or would like to estimate your
                    delivery cost.</p>
            </div> --}}
            <div class="row">
                {{-- <div class="col-sm-6">
                    <div class="chose_area">
                        <ul class="user_option">
                            <li>
                                <input type="checkbox">
                                <label>Use Coupon Code</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Use Gift Voucher</label>
                            </li>
                            <li>
                                <input type="checkbox">
                                <label>Estimate Shipping & Taxes</label>
                            </li>
                        </ul>
                        <ul class="user_info">
                            <li class="single_field">
                                <label>Country:</label>
                                <select>
                                    <option>United States</option>
                                    <option>Bangladesh</option>
                                    <option>UK</option>
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>Ucrane</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field">
                                <label>Region / State:</label>
                                <select>
                                    <option>Select</option>
                                    <option>Dhaka</option>
                                    <option>London</option>
                                    <option>Dillih</option>
                                    <option>Lahore</option>
                                    <option>Alaska</option>
                                    <option>Canada</option>
                                    <option>Dubai</option>
                                </select>

                            </li>
                            <li class="single_field zip-field">
                                <label>Zip Code:</label>
                                <input type="text">
                            </li>
                        </ul>
                        <a class="btn btn-default update" href="">Get Quotes</a>
                        <a class="btn btn-default check_out" href="">Continue</a>
                    </div>
                </div> --}}
                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li>Tổng giá trị đơn hàng <span>{{ Cart::subtotal() }} VNĐ</span></li>
                            <li>Thuế <span>{{ Cart::tax() }} VNĐ</span></li>
                            <li>Phí vận chuyển <span>Free</span></li>
                            <li>Thành tiền <span>{{ Cart::total() }} VNĐ</span></li>
                        </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        <a class="btn btn-default check_out" href="{{ route('checkout.login-checkout') }}">Thanh toán</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/#do_action-->

@endsection

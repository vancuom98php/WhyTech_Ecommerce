@extends('layout')

@section('home_content')
    @if (Cart::count() > 0)
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

                                <a href="{{ route('cart.show') }}">Giỏ hàng</a>
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

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">GIỎ HÀNG CỦA BẠN</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <div class="table-responsive">
                            @if (session()->has('notification'))
                                <div class="alert alert-danger" style="font-size: 14px; font-weight: bold;">
                                    {!! session('notification') !!}
                                </div>
                            @endif
                            <table class="table-p">
                                <tbody>
                                    @foreach ($content as $value)
                                        <!--====== Row ======-->
                                        <tr class="cart-item">
                                            <td>
                                                <div class="table-p__box">
                                                    <div class="table-p__img-wrap">

                                                        <img class="u-img-fluid" src="{{ asset($value->options->image) }}"
                                                            alt="{{ $value->name }}">
                                                    </div>
                                                    <div class="table-p__info">

                                                        <span class="table-p__name">

                                                            <a href="product-detail.html">{{ $value->name }}</a></span>

                                                        <span class="table-p__category">

                                                            <a
                                                                href="{{ route('home.category', ['category_product_slug' => $value->options->category->category_product_slug]) }}">{{ $value->options->category->category_name }}</a></span>
                                                        {{-- <ul class="table-p__variant-list">
                                                    <li>

                                                        <span>Size: 22</span></li>
                                                    <li>

                                                        <span>Color: Red</span></li>
                                                </ul> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>

                                                <span class="table-p__price">{{ number_format($value->price) }} VNĐ</span>
                                            </td>
                                            <td>
                                                <div class="table-p__input-counter-wrap">

                                                    <!--====== Input Counter ======-->
                                                    <div class="input-counter">

                                                        <a href="{{ route('cart.decrease-quantity', ['id' => $value->rowId]) }}" class="btn-quantity-decrease input-counter__minus fas fa-minus"></a>

                                                        <input class="input-counter__text input-counter--text-primary-style product_quantity"
                                                            type="text" name="product_quantity" value="{{ $value->qty }}" data-min="1"
                                                            data-max="100">
                                                        <input class="product_rowId" type="hidden" name="product_rowId" id="" value="{{ $value->rowId }}">

                                                        <a href="#" wire:click.prevent="increaseQuantity('{{ $value->rowId }}')" class="btn btn-increase input-counter__plus fas fa-plus"></a>
                                                    </div>
                                                    <!--====== End - Input Counter ======-->
                                                </div>
                                            </td>
                                            <td>

                                                <span
                                                    class="cart-total-price table-p__price">{{ number_format($value->subtotal) }} VNĐ</span>
                                            </td>
                                            <td>
                                                <div class="table-p__del-wrap">

                                                    <a class="far fa-trash-alt table-p__delete-link"
                                                        href="{{ route('cart.delete', ['id' => $value->rowId]) }}"></a>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--====== End - Row ======-->
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="route-box">
                            <div class="route-box__g1">

                                <a class="route-box__link" href="{{ route('home.shop') }}"><i
                                        class="fas fa-long-arrow-alt-left"></i>

                                    <span>TIẾP TỤC MUA SẮM</span></a>
                            </div>
                            <div class="route-box__g2">

                                <a class="route-box__link" href="cart.html"><i class="fas fa-trash"></i>

                                    <span>XÓA TOÀN BỘ GIỎ HÀNG</span></a>

                                <a class="route-box__link" href="cart.html"><i class="fas fa-sync"></i>

                                    <span>CẬP NHẬT GIỎ HÀNG</span></a>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <form class="f-cart">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                    <div class="f-cart__pad-box">
                                        <h1 class="gl-h1">TÍNH PHÍ VẬN CHUYỂN VÀ THUẾ</h1>

                                        <span class="gl-text u-s-m-b-30">Chọn vị trí giao hàng để tính phí.</span>
                                        <div class="u-s-m-b-30">

                                            <!--====== Select Box ======-->

                                            <label class="gl-label" for="shipping-country">COUNTRY *</label><select
                                                class="select-box select-box--primary-style" id="shipping-country">
                                                <option selected value="">Choose Country</option>
                                                <option value="uae">United Arab Emirate (UAE)</option>
                                                <option value="uk">United Kingdom (UK)</option>
                                                <option value="us">United States (US)</option>
                                            </select>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <!--====== Select Box ======-->

                                            <label class="gl-label" for="shipping-state">STATE/PROVINCE *</label><select
                                                class="select-box select-box--primary-style" id="shipping-state">
                                                <option selected value="">Choose State/Province</option>
                                                <option value="al">Alabama</option>
                                                <option value="al">Alaska</option>
                                                <option value="ny">New York</option>
                                            </select>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="shipping-zip">ZIP/POSTAL CODE *</label>

                                            <input class="input-text input-text--primary-style" type="text"
                                                id="shipping-zip" placeholder="Zip/Postal Code">
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <a class="f-cart__ship-link btn--e-transparent-brand-b-2"
                                                href="cart.html">CALCULATE SHIPPING</a>
                                        </div>

                                        <span class="gl-text">Note: There are some countries where free shipping is
                                            available otherwise our flat rate charges or country delivery charges will be
                                            apply.</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                    <div class="f-cart__pad-box">
                                        <h1 class="gl-h1">Ghi chú</h1>

                                        <span class="gl-text u-s-m-b-30">Thêm lưu ý của bạn về sản phẩm</span>
                                        <div>

                                            <label for="f-cart-note"></label><textarea
                                                class="text-area text-area--primary-style" id="f-cart-note"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                    <div class="f-cart__pad-box">
                                        <div class="u-s-m-b-30">
                                            <table id="totalajaxcall" class="f-cart__table">
                                                <tbody>
                                                    <tr>
                                                        <td>PHÍ VẬN CHUYỂN</td>
                                                        <td>Free</td>
                                                    </tr>
                                                    <tr>
                                                        <td>THUẾ</td>
                                                        <td>{{ Cart::tax() }} VNĐ</td>
                                                    </tr>
                                                    <div class="totalpricingsection">
                                                        <tr>
                                                            <td>TỔNG GIÁ TRỊ ĐƠN HÀNG</td>
                                                            <td>{{ Cart::subtotal() }} VNĐ</td>
                                                        </tr>
                                                        <tr>
                                                            <td>THÀNH TIỀN</td>
                                                            <td>{{ Cart::total() }} VNĐ</td>
                                                        </tr>
                                                    </div>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>
                                            @if(!session()->has('customer_id'))
                                                <a href="{{ route('checkout.login-checkout') }}" class="btn btn--e-brand-b-2" type="submit" style="text-align: center;">THỰC HIỆN THANH
                                                    TOÁN</a>
                                            @else 
                                                <a href="{{ route('checkout.checkout') }}" class="btn btn--e-brand-b-2" type="submit" style="text-align: center;">THỰC HIỆN THANH
                                                    TOÁN</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
    @else
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 u-s-m-b-30">
                        <div class="empty">
                            <div class="empty__wrap">

                                <span class="empty__big-text">TRỐNG</span>

                                <span class="empty__text-1">Bạn chưa chọn sản phẩm nào vào giỏ hàng.</span>

                                <a class="empty__redirect-link btn--e-brand" href="{{ route('home.shop') }}">TIẾP TỤC MUA SẮM</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    @endif
@endsection

@extends('layout')

@section('home_content')

    <div id="list-cart">
        {{ csrf_field() }}
        @if (session()->has('cart') && count(session()->get('cart')) > 0)
            @php
                $total = 0;
            @endphp
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
                                            @foreach (session()->get('cart') as $item)
                                                @php
                                                    $total += $item['product_quantity'] * $item['product_info']->product_price;
                                                @endphp
                                                <!--====== Row ======-->
                                                <tr class="cart-item">
                                                    <td>
                                                        <div class="table-p__box">
                                                            <div class="table-p__img-wrap">

                                                                <img class="u-img-fluid"
                                                                    src="{{ asset($item['product_info']->product_image_path) }}"
                                                                    alt="{{ $item['product_info']->product_name }}">
                                                            </div>
                                                            <div class="table-p__info">

                                                                <span class="table-p__name">

                                                                    <a
                                                                        href="{{ route('product.detail', ['product_slug' => $item['product_info']->product_slug]) }}">{{ $item['product_info']->product_name }}</a></span>

                                                                <span class="table-p__category">

                                                                    <a
                                                                        href="{{ route('home.category', ['category_product_slug' => $item['product_info']->category->category_product_slug]) }}">{{ $item['product_info']->category->category_name }}</a></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <span
                                                            class="table-p__price">{{ number_format($item['product_info']->product_price) }}
                                                            VNĐ</span>
                                                    </td>
                                                    <td>
                                                        <div class="table-p__input-counter-wrap">

                                                            <!--====== Input Counter ======-->
                                                            <div class="input-counter">

                                                                <a
                                                                    class="btn-quantity-decrease input-counter__minus fas fa-minus"></a>

                                                                <input data-id="{{ $item['session_id'] }}"
                                                                    class="input-counter__text input-counter--text-primary-style product_quantity"
                                                                    id="product_quantity_{{ $item['session_id'] }}"
                                                                    type="text" name="product_quantity"
                                                                    value="{{ $item['product_quantity'] }}" data-min="1"
                                                                    data-max="100">
                                                                <input class="product_rowId" type="hidden"
                                                                    name="product_rowId" id=""
                                                                    value="{{ $item['session_id'] }}">

                                                                <a
                                                                    class="btn-quantity-increase input-counter__plus fas fa-plus"></a>
                                                            </div>
                                                            <!--====== End - Input Counter ======-->
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <span
                                                            class="cart-total-price table-p__price">{{ number_format($item['product_quantity'] * $item['product_info']->product_price) }}
                                                            VNĐ</span>
                                                    </td>
                                                    <td>
                                                        <div class="table-p__del-wrap">

                                                            <a class="far fa-trash-alt table-p__delete-link list-cart-delete"
                                                                data-id="{{ $item['session_id'] }}"></a>
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

                                        <a class="route-box__link destroy-cart"><i class="fas fa-trash"></i>

                                            <span>XÓA TOÀN BỘ GIỎ HÀNG</span></a>

                                        <a class="route-box__link update-cart"><i class="fas fa-sync"></i>

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
                                <div class="f-cart">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                            <form class="f-cart__pad-box" method="post">
                                                @csrf
                                                <h1 class="gl-h1">TÍNH PHÍ VẬN CHUYỂN VÀ THUẾ</h1>

                                                <span class="gl-text u-s-m-b-30">Chọn vị trí giao hàng để tính phí.</span>
                                                <!--====== Street Address ======-->
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="billing-street">ĐỊA CHỈ GIAO HÀNG *</label>

                                                    <input
                                                        class="input-text input-text--primary-style @error('shipping_address') is-invalid  @enderror"
                                                        type="text" id="billing-street" placeholder="Địa chỉ nhà giao hàng"
                                                        data-bill="" name="shipping_address"
                                                        value="{{ old('shipping_address') }}" required>
                                                </div>
                                                <!--====== End - Street Address ======-->


                                                <!--====== ADDDRESS ======-->
                                                <div class="u-s-m-b-30">

                                                    <!--====== Select Box ======-->

                                                    <label class="gl-label" for="province">TỈNH/THÀNH PHỐ *</label>
                                                    <select style="font-weight: normal;"
                                                        class="select-box select-box--primary-style choose province @error('province') is-invalid  @enderror"
                                                        name="province" id="province" data-bill="">
                                                        <option value="">Chọn Tỉnh/Thành phố</option>
                                                        @foreach ($provinces as $province)
                                                            <option value="{{ $province->province_id }}">
                                                                {{ $province->province_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('province')
                                                        <div class="invalid-feedback-category-product" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    <!--====== End - Select Box ======-->
                                                </div>
                                                <div class="u-s-m-b-30">

                                                    <!--====== Select Box ======-->

                                                    <label class="gl-label" for="district">QUẬN/HUYỆN *</label>
                                                    <select style="font-weight: normal;"
                                                        class="select-box select-box--primary-style choose district @error('district') is-invalid  @enderror"
                                                        name="district" id="district" data-bill="">
                                                        <option value="">Chọn Quận/Huyện</option>
                                                    </select>
                                                    @error('district')
                                                        <div class="invalid-feedback-category-product" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    <!--====== End - Select Box ======-->
                                                </div>
                                                <div class="u-s-m-b-30">

                                                    <!--====== Select Box ======-->

                                                    <label class="gl-label" for="ward">XÃ/PHƯỜNG *</label>
                                                    <select style="font-weight: normal;"
                                                        class="select-box select-box--primary-style ward @error('ward') is-invalid  @enderror"
                                                        name="ward" id="ward" data-bill="">
                                                        <option value="">Chọn Xã/Phường</option>
                                                    </select>
                                                    @error('ward')
                                                        <div class="invalid-feedback-category-product" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </div>
                                                    @enderror
                                                    <!--====== End - Select Box ======-->
                                                </div>
                                                <!--====== End - Country ======-->
                                                <div class="u-s-m-b-30">
                                                    <button type="button"
                                                        class="f-cart__ship-link btn btn--e-transparent-brand-b-2 calculate_delivery">TÍNH
                                                        PHÍ VẬN CHUYỂN</button>
                                                </div>
                                                <span class="gl-text">Lưu ý: Có một số tỉnh/thành phố được cung cấp dịch vụ
                                                    giao hàng miễn phí, nếu không chúng tôi sẽ áp dụng mức phí theo quy định
                                                    tùy vào xa gần.</span>
                                            </form>
                                        </div>
                                        <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                            <div class="f-cart__pad-box">
                                                <h1 class="gl-h1">Ghi chú</h1>

                                                <span class="gl-text u-s-m-b-30">Thêm lưu ý của bạn về sản phẩm</span>
                                                <div>

                                                    <label for="f-cart-note"></label><textarea
                                                        class="text-area text-area--primary-style"
                                                        id="f-cart-note"></textarea>
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
                                                                @if (session()->has('feeship'))
                                                                    @php
                                                                        $total += session()->get('feeship');
                                                                    @endphp
                                                                    <td>
                                                                        {{ number_format(session()->get('feeship')) }} VNĐ</td>
                                                                @else
                                                                    <td>Free</td>
                                                                @endif
                                                            </tr>
                                                            <tr>
                                                                <td>THUẾ</td>
                                                                <td>{{ Cart::tax() }} VNĐ</td>
                                                            </tr>
                                                            <div class="totalpricingsection">
                                                                <tr>
                                                                    <td>TỔNG GIÁ TRỊ ĐƠN HÀNG</td>
                                                                    <td>{{ number_format($total) }} VNĐ</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>THÀNH TIỀN</td>
                                                                    <td>{{ number_format($total) }} VNĐ</td>
                                                                </tr>
                                                            </div>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div>
                                                    @if (!session()->has('customer_id'))
                                                        <a href="{{ route('checkout.login-checkout') }}"
                                                            class="btn btn--e-brand-b-2" type="submit"
                                                            style="text-align: center;">THỰC HIỆN THANH
                                                            TOÁN</a>
                                                    @else
                                                        <a href="{{ route('checkout.checkout') }}"
                                                            class="btn btn--e-brand-b-2" type="submit"
                                                            style="text-align: center;">THỰC HIỆN THANH
                                                            TOÁN</a>
                                                    @endif
                                                </div>
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

                                        <a class="empty__redirect-link btn--e-brand" href="{{ route('home.shop') }}">TIẾP
                                            TỤC MUA SẮM</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--====== End - Section Content ======-->
            </div>
        @endif
    </div>

@endsection

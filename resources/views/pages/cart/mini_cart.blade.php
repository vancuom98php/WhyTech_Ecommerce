<!--====== Mini Product Container ======-->
<div class="mini-product-container gl-scroll u-s-m-b-15">
    @if (session()->has('cart') && count(session()->get('cart')) > 0)
        @php
            $total = 0;
        @endphp
        @foreach (session()->get('cart') as $item)
            @php
                $total += $item['product_quantity'] * $item['product_info']->product_price;
            @endphp
            <!--====== Card for mini cart ======-->
            <div class="card-mini-product">
                <div class="mini-product">
                    <div class="mini-product__image-wrapper">

                        <a class="mini-product__link"
                            href="{{ route('product.detail', ['product_slug' => $item['product_info']->product_slug]) }}">

                            <img class="u-img-fluid"
                                src="{{ asset($item['product_info']->product_image_path) }}"
                                alt="{{ $item['product_info']->product_name }}"></a>
                    </div>
                    <div class="mini-product__info-wrapper">

                        <span class="mini-product__category">

                            <a
                                href="{{ route('home.category', ['category_product_slug' => $item['product_info']->category->category_product_slug]) }}">{{ $item['product_info']->category->category_name }}</a></span>

                        <span class="mini-product__name">

                            <a
                                href="{{ route('product.detail', ['product_slug' => $item['product_info']->product_slug]) }}">{{ $item['product_info']->product_name }}</a></span>

                        <span
                            class="mini-product__quantity">{{ $item['product_quantity'] }}
                            x </span>

                        <span
                            class="mini-product__price">{{ number_format($item['product_info']->product_price) }}
                            VNĐ</span>
                    </div>
                </div>

                <a class="mini-product__delete-link far fa-trash-alt" data-id="{{ $item['session_id'] }}"></a>
            </div>
            <!--====== End - Card for mini cart ======-->
        @endforeach
    @else
        <div class="card-mini-product">
            <div class="mini-product">
                <img src="{{ asset('frontend/images/empty-cart.png') }}"
                    alt="Empty Cart" width="100%">
            </div>
        </div>
    @endif
</div>
<!--====== End - Mini Product Container ======-->


<!--====== Mini Product Statistics ======-->
<div class="mini-product-stat">
    @if (session()->has('cart') && count(session()->get('cart')) > 0)
        <input hidden id="total-quantity-cart" type="number" value="{{ count(session()->get('cart')) }}">
        <div class="mini-total">

            <span class="subtotal-text">TỔNG GIÁ TRỊ</span>

            <span class="subtotal-value">{{ number_format($total) }}
                VNĐ</span>
        </div>
    @endif
    <div class="mini-action">
        @if (session()->has('customer_id'))
            <a class="mini-link btn--e-brand-b-2"
                href="{{ route('checkout.checkout') }}">TIẾN HÀNH THANH
                TOÁN</a>
        @else
            <a class="mini-link btn--e-brand-b-2"
                href="{{ route('checkout.login-checkout') }}">TIẾN HÀNH
                THANH TOÁN</a>
        @endif

        <a class="mini-link btn--e-transparent-secondary-b-2"
            href="{{ route('cart.show') }}">XEM GIỎ HÀNG</a>
    </div>
</div>
<!--====== End - Mini Product Statistics ======-->
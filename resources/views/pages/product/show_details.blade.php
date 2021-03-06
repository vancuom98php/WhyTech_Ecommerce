@extends('layout')

@section('home_content')

    <!--====== Section 1 ======-->
    <div class="u-s-p-t-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <!--====== Product Breadcrumb ======-->
                    <div class="pd-breadcrumb u-s-m-b-30">
                        <ul class="pd-breadcrumb__list">
                            <li class="has-separator">

                                <a href="{{ url('/') }}">Trang chủ</a>
                            </li>
                            @if ($product->category->categoryParent != null)
                                <li class="has-separator">

                                    <a
                                        href="{{ route('home.category', ['category_product_slug' => $product->category->categoryParent->category_product_slug]) }}">{{ $product->category->categoryParent->category_name }}</a>
                                </li>
                            @endif
                            <li class="is-marked">
                                <a id="wishlist_categoryurl_{{ $product->product_id }}"
                                    href="{{ route('home.category', ['category_product_slug' => $product->category->category_product_slug]) }}">{{ $product->category->category_name }}</a>
                            </li>
                        </ul>
                    </div>
                    <!--====== End - Product Breadcrumb ======-->


                    <!--====== Product Detail Zoom ======-->
                    <div class="pd u-s-m-b-30">
                        <div class="slider-fouc pd-wrap">
                            <div id="pd-o-initiate">
                                <div class="pd-o-img-wrap" data-src="{{ asset($product->product_image_path) }}">
                                    <img id="wishlist_productimage_{{ $product->product_id }}" style="height: 445px"
                                        class="u-img-fluid" src="{{ asset($product->product_image_path) }}"
                                        data-zoom-image="{{ asset($product->product_image_path) }}"
                                        alt="{{ $product->product_name }}">
                                </div>
                                @foreach ($galleries as $gallery)
                                    <div class="pd-o-img-wrap" data-src="{{ asset($gallery->gallery_image) }}">
                                        <img style="height: 445px" class="u-img-fluid"
                                            src="{{ asset($gallery->gallery_image) }}"
                                            data-zoom-image="{{ asset($gallery->gallery_image) }}"
                                            alt="{{ $gallery->gallery_name }}">
                                    </div>
                                @endforeach
                            </div>

                            <span class="pd-text">Nhấn để xem rõ hơn</span>
                        </div>
                        <div class="u-s-m-t-15">
                            <div class="slider-fouc">
                                <div id="pd-o-thumbnail">
                                    <div>
                                        <img style="height: 120px" class="u-img-fluid"
                                            src="{{ asset($product->product_image_path) }}"
                                            alt="{{ $product->product_name }}">
                                    </div>
                                    @foreach ($galleries as $gallery)
                                        <div>
                                            <img style="height: 120px" class="u-img-fluid"
                                                src="{{ asset($gallery->gallery_image) }}"
                                                alt="{{ $gallery->gallery_name }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--====== End - Product Detail Zoom ======-->
                </div>
                <div class="col-lg-7">

                    <!--====== Product Right Side Details ======-->
                    <div class="pd-detail">
                        <div>

                            <a id="wishlist_producturl_{{ $product->product_id }}"
                                href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}"
                                class="pd-detail__name">{{ $product->product_name }}</a>
                        </div>
                        <div>
                            <div class="pd-detail__inline">

                                <span class="pd-detail__price">{{ number_format($product->product_price) }} VNĐ</span>

                                {{-- <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del> --}}
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__rating gl-rating-style">
                                @php
                                    $ratingAvg = $product->comments->avg('rating');
                                @endphp
                                @for ($i = 0; $i < floor($ratingAvg); $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                                @if ($ratingAvg - (int) $ratingAvg > 0 && $ratingAvg - (int) $ratingAvg <= 0.5)
                                    <i class="fas fa-star-half-alt"></i>
                                @elseif($ratingAvg - (int) $ratingAvg == 0)
                                @else
                                    <i class="fas fa-star"></i>
                                @endif

                                <span class="pd-detail__review u-s-m-l-4">

                                    <a data-click-scroll="#view-review">{{ $totalReview }} Đánh giá</a></span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__stock">Mới (100%)</span>

                                <span class="pd-detail__left">Còn hàng</span>
                            </div>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__preview-desc">{!! $product->product_desc !!}</span>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                    <input type="hidden" id="wishlist_productname_{{ $product->product_id }}"
                                        value="{{ $product->product_name }}">
                                    <input type="hidden" id="wishlist_productprice_{{ $product->product_id }}"
                                        value="{{ number_format($product->product_price) }} VNĐ">
                                    <input type="hidden" id="wishlist_category_{{ $product->product_id }}"
                                        value="{{ $product->category->category_name }}">

                                    <a id="{{ $product->product_id }}" onclick="add_wishlist(this.id)">Thêm vào danh sách
                                        yêu thích</a>

                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <div class="pd-detail__inline">

                                <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                    <a href="signin.html">Email khi có giảm giá mặt hàng</a>

                                    {{-- <span class="pd-detail__click-count">(20)</span></span> --}}
                            </div>
                        </div>
                        <div class="u-s-m-b-15">
                            <ul class="pd-social-list">
                                <li>

                                    <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>

                                    <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>

                                    <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>

                                    <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                                </li>
                                <li>

                                    <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="u-s-m-b-15">
                            <form class="pd-detail__form" method="POST">
                                @csrf
                                <div class="pd-detail-inline-2">
                                    <div class="u-s-m-b-15">

                                        <!--====== Input Counter ======-->
                                        <div class="input-counter">

                                            <span class="input-counter__minus fas fa-minus"></span>

                                            <input
                                                class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_{{ $product->product_id }}"
                                                type="text" name="product_quantity" data-min="1" data-max="1000">

                                            <span class="input-counter__plus fas fa-plus"></span>

                                        </div>
                                        <!--====== End - Input Counter ======-->
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <input type="hidden" class="cart_product_id_{{ $product->product_id }}"
                                            value="{{ $product->product_id }}" />

                                        <button class="btn btn--e-brand-b-2 btn-add-cart" type="button" data-modal="modal"
                                            data-modal-id="#add-to-cart-{{ $product->product_slug }}"
                                            data-tooltip="tooltip" data-placement="top"
                                            data-id_product="{{ $product->product_id }}" name="add_cart">Thêm vào giỏ
                                            hàng</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="u-s-m-b-15">

                            <span class="pd-detail__label u-s-m-b-8">Chính sách sản phẩm:</span>
                            <ul class="pd-detail__policy-list">
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Bảo vệ thông tin khách hàng.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Hoàn tiền đầy đủ nếu bạn không nhận được đơn hàng của mình.</span>
                                </li>
                                <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                    <span>Chấp nhận hoàn trả nếu sản phẩm không như mô tả.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--====== End - Product Right Side Details ======-->
                </div>
            </div>
        </div>
    </div>

    <!--====== Product Detail Tab ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pd-tab">
                        <div class="u-s-m-b-30">
                            <ul class="nav pd-tab__list">
                                <li class="nav-item">

                                    <a class="nav-link active" data-toggle="tab" href="#pd-desc">MÔ TẢ</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link" data-toggle="tab" href="#pd-tag">CHI TIẾT</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link" id="view-review" data-toggle="tab" href="#pd-rev">ĐÁNH GIÁ

                                        <span>({{ $totalReview }})</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">

                            <!--====== Tab 1 ======-->
                            <div class="tab-pane fade show active" id="pd-desc">
                                <div class="pd-tab__desc">
                                    <div class="u-s-m-b-15">
                                        {{ $product->product_desc }}
                                    </div>
                                    {{-- <div class="u-s-m-b-30"><iframe src="https://www.youtube.com/embed/qKqSBm07KZk"
                                            allowfullscreen></iframe></div> --}}
                                </div>
                            </div>
                            <!--====== End - Tab 1 ======-->


                            <!--====== Tab 2 ======-->
                            <div class="tab-pane" id="pd-tag">
                                <div class="pd-tab__tag">
                                    <div class="u-s-m-b-15">
                                        {!! $product->product_content !!}
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 2 ======-->


                            <!--====== Tab 3 ======-->
                            <div class="tab-pane" id="pd-rev">
                                <div class="pd-tab__rev">
                                    <div class="u-s-m-b-30">
                                        <div class="pd-tab__rev-score">
                                            <div class="u-s-m-b-8">
                                                <h2>{{ $totalReview }} Đánh giá - {{ $ratingAvg }} (Chung)</h2>
                                            </div>
                                            <div class="gl-rating-style-2 u-s-m-b-8">
                                                @for ($i = 0; $i < floor($ratingAvg); $i++)
                                                    <i class="fas fa-star"></i>
                                                @endfor
                                                @if ($ratingAvg - (int) $ratingAvg > 0 && $ratingAvg - (int) $ratingAvg <= 0.5)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @elseif($ratingAvg - (int) $ratingAvg == 0)
                                                @else
                                                    <i class="fas fa-star"></i>
                                                @endif
                                            </div>
                                            <div class="u-s-m-b-8">
                                                <h4>Chúng tôi muốn lắng nghe từ bạn!</h4>
                                            </div>

                                            <span class="gl-text">Bạn nghĩ như thế nào về sản phẩm này</span>
                                        </div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <form class="pd-tab__rev-f1" method="POST">
                                            @csrf
                                            <input type="hidden" class="comment_product_id" name="comment_product_id"
                                                value={{ $product->product_id }}>
                                            <div class="rev-f1__group">
                                                <div class="u-s-m-b-15">
                                                    <h2>Các đánh giá cho {{ $product->product_name }}</h2>
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <label for="sort-review"></label><select
                                                        class="select-box select-box--primary-style" id="sort-review">
                                                        <option selected>Sắp xếp: Tốt nhất</option>
                                                        <option>Sắp xếp: Tệ nhất</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div id="review_item" class="rev-f1__review">

                                            </div>
                                        </form>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <form id="review_form" class="pd-tab__rev-f2" method="POST">
                                            <h2 class="u-s-m-b-15">Thêm đánh giá</h2>

                                            <span class="gl-text u-s-m-b-15">Số điện thoại của bạn sẽ không được công bố.
                                                Các trường bắt buộc được đánh dấu *</span>
                                            <div class="u-s-m-b-30">
                                                <div class="rev-f2__table-wrap gl-scroll">
                                                    <table class="rev-f2__table">
                                                        <thead>
                                                            <tr>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(1)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(1.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(2)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(2.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(3)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(3.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(4)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star-half-alt"></i>

                                                                        <span>(4.5)</span>
                                                                    </div>
                                                                </th>
                                                                <th>
                                                                    <div class="gl-rating-style-2"><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i><i
                                                                            class="fas fa-star"></i>

                                                                        <span>(5)</span>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-1" name="rating"
                                                                            value="1">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-1"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-1.5" name="rating"
                                                                            value="1.5">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-1.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-2" name="rating"
                                                                            value="2">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-2"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-2.5" name="rating"
                                                                            value="2.5">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-2.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-3" name="rating"
                                                                            value="3">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-3"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-3.5" name="rating"
                                                                            value="3.5">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-3.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-4" name="rating"
                                                                            value="4">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-4"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-4.5" name="rating"
                                                                            value="4.5">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-4.5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                                <td>

                                                                    <!--====== Radio Box ======-->
                                                                    <div class="radio-box">

                                                                        <input type="radio" id="star-5" name="rating"
                                                                            value="5">
                                                                        <div
                                                                            class="radio-box__state radio-box__state--primary">

                                                                            <label class="radio-box__label"
                                                                                for="star-5"></label>
                                                                        </div>
                                                                    </div>
                                                                    <!--====== End - Radio Box ======-->
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="rev-f2__group">
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="reviewer-text">ĐÁNH GIÁ CỦA
                                                        BẠN</label>
                                                    <textarea class="text-area text-area--primary-style comment_content"
                                                        name="comment_content" id="reviewer-text"></textarea>
                                                </div>
                                                <div>
                                                    <p class="u-s-m-b-30">

                                                        <label class="gl-label" for="reviewer-name">HỌ VÀ TÊN
                                                            *</label>

                                                        <input class="input-text input-text--primary-style comment_name"
                                                            type="text" name="comment_name" id="reviewer-name">
                                                    </p>
                                                    <p class="u-s-m-b-30">

                                                        <label class="gl-label" for="comment_phone">SỐ ĐIỆN THOẠI
                                                            *</label>

                                                        <input class="input-text input-text--primary-style comment_phone"
                                                            type="text" name="comment_phone" id="comment_phone">
                                                    </p>
                                                </div>
                                            </div>
                                            <div>
                                                <input class="btn btn--e-brand-shadow submit_comment" type="button"
                                                    value="GỬI ĐÁNH GIÁ">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Tab 3 ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Product Detail Tab ======-->
    <div class="u-s-p-b-90">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-46">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary u-s-m-b-12">SẨN PHẨM LIÊN QUAN</h1>

                            <span class="section__span u-c-grey">CÁC SẢN PHẨM LIÊN QUAN ĐƯỢC TÌM KIẾM NHIỀU</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="slider-fouc">
                    <div class="owl-carousel product-slider" data-item="4">
                        @foreach ($related_products as $product)
                            <div class="u-s-m-b-30">
                                <div class="product-o product-o--hover-on">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">

                                            <img id="wishlist_productimage_{{ $product->product_id }}"
                                                class="aspect__img" src="{{ asset($product->product_image_path) }}"
                                                alt="{{ $product->product_name }}"></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#{{ $product->product_slug }}"
                                                        data-tooltip="tooltip" data-placement="top" title="Xem nhanh"><i
                                                            class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>
                                                    <form method="POST">
                                                        @csrf
                                                        <input
                                                            class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_{{ $product->product_id }}"
                                                            type="hidden" name="product_quantity" value="1" />
                                                        <input type="hidden"
                                                            class="cart_product_id_{{ $product->product_id }}"
                                                            value="{{ $product->product_id }}" />

                                                        <button class="btn btn--e-brand btn-add-cart btn-add-cart-home"
                                                            type="button" data-modal="modal"
                                                            data-modal-id="#add-to-cart-{{ $product->product_slug }}"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            data-id_product="{{ $product->product_id }}"
                                                            name="add_cart"><i
                                                                class="fas fa-plus-circle fa-add-cart"></i></button>
                                                    </form>
                                                </li>
                                                <li>
                                                    <input type="hidden"
                                                        id="wishlist_productname_{{ $product->product_id }}"
                                                        value="{{ $product->product_name }}">
                                                    <input type="hidden"
                                                        id="wishlist_productprice_{{ $product->product_id }}"
                                                        value="{{ number_format($product->product_price) }} VNĐ">
                                                    <input type="hidden"
                                                        id="wishlist_category_{{ $product->product_id }}"
                                                        value="{{ $product->category->category_name }}">

                                                    <a data-tooltip="tooltip" data-placement="top" id="{{ $product->product_id }}"
                                                        onclick="add_wishlist(this.id)" title="Thêm danh sách yêu thích"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Email cho tôi khi sản phẩm giảm giá"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a id="wishlist_categoryurl_{{ $product->product_id }}"
                                            href="{{ route('home.category', ['category_product_slug' => $product->category->category_product_slug]) }}">{{ optional($product->category)->category_name }}</a></span>

                                    <span class="product-o__name">

                                        <a id="wishlist_producturl_{{ $product->product_id }}"
                                            href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">{{ $product->product_name }}</a></span>
                                    <div class="product-o__rating gl-rating-style">
                                        @php
                                            $ratingAvg = $product->comments->avg('rating');
                                        @endphp
                                        @for ($i = 0; $i < floor($ratingAvg); $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        @if ($ratingAvg - (int) $ratingAvg > 0 && $ratingAvg - (int) $ratingAvg <= 0.5)
                                            <i class="fas fa-star-half-alt"></i>
                                        @elseif($ratingAvg - (int) $ratingAvg == 0)
                                        @else
                                            <i class="fas fa-star"></i>
                                        @endif

                                        <span class="product-o__review">({{ $product->comments->count() }})</span>
                                    </div>

                                    <span class="product-o__price">{{ number_format($product->product_price) }} VNĐ

                                        {{-- <span class="product-o__discount">$160.00</span></span> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 1 ======-->

@endsection

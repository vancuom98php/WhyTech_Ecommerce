@extends('layout')

@section('sidebar')
    @include('pages.include.side')
@endsection

@section('shopping_content')

    <div class="col-lg-9 col-md-12">
        <div class="shop-p">
            <div class="shop-p__toolbar u-s-m-b-30">
                <div class="shop-p__meta-wrap u-s-m-b-60">

                    <span class="shop-p__meta-text-1">{{ $categoryBySlug->category_name }}</span>
                </div>
                <div class="shop-p__tool-style">
                    <div class="tool-style__group u-s-m-b-8">

                        <span class="js-shop-grid-target is-active"><i class="fas fa-th"></i></span>

                        <span class="js-shop-list-target"><i class="fas fa-list"></i></span>
                    </div>
                    <form method="post">
                        @csrf
                        <div class="u-s-m-b-8">
                            <select name="sort" id="sort" class="select-box select-box--transparent-b-2">
                                @php
                                    $options = [
                                        'new' => 'Mới nhất',
                                        'old' => 'Cũ nhất',
                                        'az' => 'A-Z',
                                        'za' => 'Z-A',
                                        'inc' => 'Giá tăng dần',
                                        'desc' => 'Giá giảm dần',
                                    ]
                                @endphp
                                @foreach($options as $key => $value)
                                    <option value="{{ Request::url() }}?sort_by={{ $key }}" @if(isset($_GET['sort_by']) && $_GET['sort_by'] == $key) selected @endif>Sắp xếp: {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
            </div>
            <div class="shop-p__collection">
                <div class="row is-grid-active">
                    @foreach ($productByCategorySlug as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-m">
                                <div class="product-m__thumb">

                                    <a id="wishlist_producturl_{{ $product->product_id }}"
                                        class="aspect aspect--bg-grey aspect--square u-d-block"
                                        href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">

                                        <img id="wishlist_productimage_{{ $product->product_id }}" class="aspect__img"
                                            src="{{ asset($product->product_image_path) }}"
                                            alt="{{ $product->product_name }}"></a>
                                    <div class="product-m__quick-look">

                                        <a class="fas fa-search" data-modal="modal"
                                            data-modal-id="#{{ $product->product_slug }}" data-tooltip="tooltip"
                                            data-placement="top" title="Xem nhanh"></a>
                                    </div>
                                    <form class="product-m__add-cart" method="POST">
                                        @csrf
                                        <input
                                            class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_{{ $product->product_id }}"
                                            type="hidden" name="product_quantity" value="1" />
                                        <input type="hidden" class="cart_product_id_{{ $product->product_id }}"
                                            value="{{ $product->product_id }}" />

                                        <button class="btn btn--e-brand btn-add-cart" type="button" data-modal="modal"
                                            data-modal-id="#add-to-cart-{{ $product->product_slug }}"
                                            data-tooltip="tooltip" data-placement="top"
                                            data-id_product="{{ $product->product_id }}" name="add_cart"><i
                                                class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                                <div class="product-m__content">
                                    <div class="product-m__category">

                                        <a id="wishlist_categoryurl_{{ $product->product_id }}"
                                            href="{{ route('home.category', ['category_product_slug' => $product->category->category_product_slug]) }}">{{ $product->category->category_name }}</a>
                                    </div>
                                    <div class="product-m__name">

                                        <a
                                            href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                                    </div>
                                    <div class="product-m__rating gl-rating-style">
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

                                        <span
                                            class="product-m__review">({{ $product->comments->where('comment_parent_comment', 0)->count() }})</span>
                                    </div>
                                    <div class="product-m__price">{{ number_format($product->product_price) }} VNĐ</div>
                                    <div class="product-m__hover">
                                        <div class="product-m__preview-description">

                                            <span>{!! $product->product_desc !!}</span>
                                        </div>
                                        <div class="product-m__wishlist">
                                            <input type="hidden" id="wishlist_productname_{{ $product->product_id }}"
                                                value="{{ $product->product_name }}">
                                            <input type="hidden" id="wishlist_productprice_{{ $product->product_id }}"
                                                value="{{ number_format($product->product_price) }} VNĐ">
                                            <input type="hidden" id="wishlist_category_{{ $product->product_id }}"
                                                value="{{ $product->category->category_name }}">
                                            <a id="{{ $product->product_id }}" onclick="add_wishlist(this.id)"
                                                class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top"
                                                title="Thêm danh sách yêu thích"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <ul class="shop-p__pagination">
                    {{ $productByCategorySlug->links() }}
                </ul>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection

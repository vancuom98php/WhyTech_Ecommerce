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

                        <span class="js-shop-list-target"><i class="fas fa-list"></i></span></div>
                    <form>
                        <div class="tool-style__form-wrap">
                            <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                    <option>Hiện: 8</option>
                                    <option selected>Hiện: 12</option>
                                    <option>Hiện: 16</option>
                                    <option>Hiện: 28</option>
                                </select></div>
                            <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                    <option selected>Sắp xếp: Mới nhất</option>
                                    <option>Sắp xếp: Cũ nhất</option>
                                    <option>Sắp xếp: Bán chạy nhất</option>
                                    <option>Sắp xếp: Đánh giá cao nhất</option>
                                    <option>Sắp xếp: Giá thấp nhất</option>
                                    <option>Sắp xếp: Cao nhất</option>
                                </select></div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="shop-p__collection">
                <div class="row is-grid-active">
                    @foreach( $productByCategorySlug as $product)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product-m">
                                <div class="product-m__thumb">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">

                                        <img class="aspect__img" src="{{ asset($product->product_image_path) }}" alt="{{ $product->product_name }}"></a>
                                    <div class="product-m__quick-look">

                                        <a class="fas fa-search" data-modal="modal" data-modal-id="#{{ $product->product_slug }}"
                                            data-tooltip="tooltip" data-placement="top" title="Xem nhanh"></a>
                                    </div>
                                    <form class="product-m__add-cart" method="POST">
                                        @csrf
                                        <input class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_{{ $product->product_id }}" type="hidden" name="product_quantity" value="1"/>
                                        <input type="hidden" class="cart_product_id_{{ $product->product_id }}" value="{{ $product->product_id }}"/>

                                        <button class="btn btn--e-brand btn-add-cart" type="button" data-modal="modal" data-modal-id="#add-to-cart-{{$product->product_slug }}" data-tooltip="tooltip" data-placement="top" data-id_product="{{ $product->product_id }}" name="add_cart"><i class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                                    </form>
                                </div>
                                <div class="product-m__content">
                                    <div class="product-m__category">

                                        <a href="{{ route('home.category', ['category_product_slug' => $product->category->category_product_slug]) }}">{{ $product->category->category_name }}</a>
                                    </div>
                                    <div class="product-m__name">

                                        <a href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                                    </div>
                                    <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i
                                            class="far fa-star"></i><i class="far fa-star"></i>

                                        <span class="product-m__review">(19)</span>
                                    </div>
                                    <div class="product-m__price">{{ number_format($product->product_price) }} VNĐ</div>
                                    <div class="product-m__hover">
                                        <div class="product-m__preview-description">

                                            <span>{!! $product->product_desc !!}</span>
                                        </div>
                                        <div class="product-m__wishlist">

                                            <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top"
                                                title="Thêm danh sách yêu thích"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="u-s-p-y-60">

                <!--====== Pagination ======-->
                <ul class="shop-p__pagination">
                    <li class="is-active">

                        <a href="shop-side-version-2.html">1</a>
                    </li>
                    <li>

                        <a href="shop-side-version-2.html">2</a>
                    </li>
                    <li>

                        <a href="shop-side-version-2.html">3</a>
                    </li>
                    <li>

                        <a href="shop-side-version-2.html">4</a>
                    </li>
                    <li>

                        <a class="fas fa-angle-right" href="shop-side-version-2.html"></a>
                    </li>
                </ul>
                <!--====== End - Pagination ======-->
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

@endsection

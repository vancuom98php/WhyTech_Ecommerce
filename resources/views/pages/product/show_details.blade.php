@extends('layout')

@section('home_content')
    <div class="product-details">
        <!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="{{ asset($product->product_image_path) }}" alt="{{ $product->product_name }}" />
                <h3>ZOOM</h3>
            </div>
            <div id="similar-product" class="carousel slide" data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar1.jpg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar2.jpg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar3.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar1.jpg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar2.jpg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar3.jpg') }}" alt=""></a>
                    </div>
                    <div class="item">
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar1.jpg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar2.jpg') }}" alt=""></a>
                        <a href=""><img src="{{ asset('frontend/images/product-details/similar3.jpg') }}" alt=""></a>
                    </div>

                </div>

                <!-- Controls -->
                <a class="left item-control" href="#similar-product" data-slide="prev">
                    <i class="fa fa-angle-left"></i>
                </a>
                <a class="right item-control" href="#similar-product" data-slide="next">
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!--/product-information-->
                {{-- <img src="{{ asset('frontend/images/product-details/new.jpg') }}" class="newarrival" alt="" /> --}}
                <h2 class="product_name">{{ $product->product_name }}</h2>
                <p>Mã sản phẩm: {{ $product->product_id }}</p>
                <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt="" />

                <form role="form" action="{{ route('cart.add') }}" method="post">
                    @csrf
                    <span class="detail_product_add_cart" style="width: 100%; display: flex; flex-direction: column;">
                        <span class="product_price">{{ number_format($product->product_price) }} VNĐ</span>
                        <div style="font-size: 18px;">
                            <label>Số lượng:</label>
                            <input type="number" name="quantity" value="1" min="1" />
                            <input type="hidden" name="product_id_hidden" value="{{ $product->product_id }}"/>
                            <button type="submit" class="btn btn-fefault cart add_cart">
                                <i class="fa fa-shopping-cart" style="margin-right: 5px"></i>
                                Thêm vào giỏ hàng
                            </button>
                        </div>
                    </span>
                </form>
                <p style="color: green"><b>Tình trạng:</b> Còn hàng</p>
                <p><b>Hàng:</b> New (100%)</p>
                <p><b>Danh mục:</b> {{ optional($product->category)->category_name }}</p>
                <p><b>Thương hiệu:</b> {{ optional($product->brand)->brand_name }}</p>
                <a href=""><img src="{{ asset('frontend/images/product-details/share.png') }}"
                        class="share img-responsive" alt="" /></a>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->

    <div class="category-tab shop-details-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="details">
                <p>{!! $product->product_desc !!}</p>
            </div>

            <div class="tab-pane fade" id="companyprofile">
                <p>{!! $product->product_content !!}</p>
            </div>

            <div class="tab-pane fade" id="reviews">
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                        et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                        aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur.</p>
                    <p><b>Write Your Review</b></p>

                    <form action="#">
                        <span>
                            <input type="text" placeholder="Your Name" />
                            <input type="email" placeholder="Email Address" />
                        </span>
                        <textarea name=""></textarea>
                        <b>Đánh giá: </b> <img src="{{ asset('frontend/images/product-details/rating.png') }}" alt="" />
                        <button type="button" class="btn btn-default pull-right">
                            Gửi
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!--/category-tab-->

    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sản phẩm tương tự</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($related_products as $related_product)
                        <a href="{{ route('product.detail', ['product_slug' => $related_product->product_slug]) }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center product-info-related">
                                            <img src="{{ asset($related_product->product_image_path) }}" alt="" />
                                            <h2 style="font-size: 18px;">
                                                {{ number_format($related_product->product_price) }} VNĐ</h2>
                                            <p>{{ $related_product->product_name }}</p>
                                            <button type="button" class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Thêm giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
@endsection

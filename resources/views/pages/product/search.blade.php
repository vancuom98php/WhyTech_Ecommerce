@extends('layout')

@section('sidebar')
@include('pages.include.sidebar')
@endsection

@section('home_content')
<div class="features_items">
    <!--features_items-->
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    @if (session()->has('notification'))
        <div class="alert alert-warning" style="font-weight: bold;">
            {!! session('notification') !!}
        </div>
    @else
        <div class="row">
            @foreach ($products as $product)
                <a href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">
                    <div class="col-sm-3">
                        <div class="product-image-wrapper product-image-wrapper-index">
                            <div class="single-products">
                                <div class="productinfo text-center product-info-index">
                                    <img src="{{ asset($product->product_image_path) }}"
                                        alt="{{ $product->product_name }}" />
                                    <h2>{{ number_format($product->product_price) }} VNĐ</h2>
                                    <p>{{ $product->product_name }}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Thêm
                                        giỏ
                                        hàng</a>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Yêu thích</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>So sánh</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
        <div class="row">
            <div class="col-sm-7 offset-sm-4 text-right text-center-xs">
                {{ $products->links() }}
            </div>
        </div>
    @endif
</div>
<!--features_items-->
@endsection

<div class="suggest-category">
    <p class="title-find">Có phải bạn đang tìm</p>
    <ul class="list-find-ajax" style="margin-top: 10px">
        @foreach ($categories as $category)
            <a href="{{ route('home.category', ['category_product_slug' => $category->category_product_slug]) }}">
                <li class="suggest-category-item" class="find-ajax-item">
                    {{ $category->category_name }}
                </li>
            </a>
        @endforeach
    </ul>
</div>

<div class="find-products-result">
    <p class="title-find-products">Sản phẩm gợi ý</p>
    <ul class="list-find-ajax">
        @forelse ($products as $product)
            <a href="{{ route('product.detail', ['product_slug' => $product->product_slug]) }}">
                <li class="find-ajax-item">
                    <img src="{{ asset($product->product_image_path) }}" height="50px" width="50px"
                        alt="{{ $product->product_name }}" />
                    <div class="div" style="margin-left: 15px;">
                        <p>{{ $product->product_name }}</p>
                        <strong style="font-size: 12px; color: #ff4500;">{{ number_format($product->product_price) }}
                            VNĐ</strong>
                    </div>
                </li>
            </a>
        @empty
            <li style="color: red; padding: 0 20px;">
                Không tìm thấy kết quả tương ứng <i class="far fa-sad-cry"></i>
            </li>
        @endforelse
    </ul>
</div>

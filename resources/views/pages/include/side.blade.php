<div class="u-s-p-y-90">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="shop-w-master">
                    <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                        <span>LỌC SẢN PHẨM</span>
                    </h1>
                    <div class="shop-w-master__sidebar">
                        <div class="u-s-m-b-30">
                            <div class="shop-w shop-w--style">
                                <div class="shop-w__intro-wrap">
                                    <h1 class="shop-w__h">DANH MỤC</h1>

                                    <span class="fas fa-minus shop-w__toggle" data-target="#s-category"
                                        data-toggle="collapse"></span>
                                </div>
                                <div class="shop-w__wrap collapse show" id="s-category">
                                    <ul class="shop-w__category-list gl-scroll">
                                        @foreach ($categories as $category)
                                            @if ($category->categoryChildren->count() > 0)
                                                <li class="has-list">
                                                    <a
                                                        href="{{ route('home.category', ['category_product_slug' => $category->category_product_slug]) }}">{{ $category->category_name }}</a>
                                                    <span
                                                        class="category-list__text u-s-m-l-6">({{ $category->products->merge($category->childrenProducts)->count() }})</span>
                                                    <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                                    <ul>
                                                        @foreach ($category->categoryChildren as $categoryChildren)
                                                            <li class="has-list">
                                                                <a
                                                                    href="{{ route('home.category', ['category_product_slug' => $categoryChildren->category_product_slug]) }}">{{ $categoryChildren->category_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                        @foreach ($categories as $category)
                                            @if ($category->categoryChildren->count() == 0)
                                                <li>
                                                    <a
                                                        href="{{ route('home.category', ['category_product_slug' => $category->category_product_slug]) }}">{{ $category->category_name }}</a>

                                                    <span style="line-height: 27px;"
                                                        class="category-list__text u-s-m-l-6">({{ $category->products->count() }})</span>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <div class="shop-w shop-w--style">
                                <div class="shop-w__intro-wrap">
                                    <h1 class="shop-w__h">THƯƠNG HIỆU</h1>

                                    <span class="fas fa-minus shop-w__toggle" data-target="#s-manufacturer"
                                        data-toggle="collapse"></span>
                                </div>
                                <div class="shop-w__wrap collapse show" id="s-manufacturer">
                                    <ul class="shop-w__category-list gl-scroll">
                                        @foreach ($brands as $brand)
                                            <li>
                                                <a
                                                    href="{{ route('home.brand', ['brand_slug' => $brand->brand_slug]) }}">{{ $brand->brand_name }}</a>

                                                <span style="float: right; font-size: 10px; line-height: 27px;"
                                                    class="brand-list__text u-s-m-l-6">{{ $brand->products->count() }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="u-s-m-b-30">
                            <div class="shop-w shop-w--style">
                                <div class="shop-w__intro-wrap">
                                    <h1 class="shop-w__h">GIÁ</h1>

                                    <span class="fas fa-minus shop-w__toggle" data-target="#s-price"
                                        data-toggle="collapse"></span>
                                </div>
                                <div class="shop-w__wrap collapse show" id="s-price">
                                    <form class="shop-w__form-p">
                                        <div class="shop-w__form-p-wrap">
                                            <div>

                                                <label for="price-min"></label>

                                                <input name="price_min" class="input-text input-text--primary-style"
                                                    type="number" min="10000" id="price-min"
                                                    placeholder="<?= isset($_GET['price_min']) ? $_GET['price_min'] : 'Min' ?>">
                                            </div>
                                            <div>

                                                <label for="price-max"></label>

                                                <input name="price_max" class="input-text input-text--primary-style"
                                                    type="number" max="100000000" id="price-max"
                                                    placeholder="<?= isset($_GET['price_max']) ? $_GET['price_max'] : 'Max' ?>">
                                            </div>
                                            <div>
                                                <button
                                                    class="btn btn--icon fas fa-angle-right btn--e-transparent-platinum-b-2"
                                                    type="submit"></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

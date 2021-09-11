

<?php $__env->startSection('slider'); ?>
    <?php echo $__env->make('pages.include.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('home_content'); ?>

<!--====== Section 1 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">NỔI BẬT</h1>

                        <span class="section__span u-c-silver">SẢN PHẨM ĐƯỢC ƯA CHUỘNG NHẤT</span>
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
                <div class="col-lg-5 col-md-5 u-s-m-b-30">

                    <a class="collection" href="<?php echo e(route('product.detail', ['product_slug' => $top_products[0]->product_slug])); ?>">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img collection__img" src="<?php echo e(asset($top_products[0]->product_image_path)); ?>" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 col-md-7 u-s-m-b-30">

                    <a class="collection" href="<?php echo e(route('product.detail', ['product_slug' => $top_products[1]->product_slug])); ?>">
                        <div class="aspect aspect--bg-grey aspect--1286-890">

                            <img class="aspect__img collection__img" src="<?php echo e(asset($top_products[1]->product_image_path)); ?>" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 col-md-7 u-s-m-b-30">

                    <a class="collection" href="<?php echo e(route('product.detail', ['product_slug' => $top_products[2]->product_slug])); ?>">
                        <div class="aspect aspect--bg-grey aspect--1286-890">

                            <img class="aspect__img collection__img" src="<?php echo e(asset($top_products[2]->product_image_path)); ?>" alt="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-5 col-md-5 u-s-m-b-30">

                    <a class="collection" href="<?php echo e(route('product.detail', ['product_slug' => $top_products[3]->product_slug])); ?>">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img collection__img" src="<?php echo e(asset($top_products[3]->product_image_path)); ?>" alt="">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!--====== Section Content ======-->
</div>
<!--====== End - Section 1 ======-->


<!--====== Section 2 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-16">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">DANH MỤC HOT</h1>

                        <span class="section__span u-c-silver">CHỌN DANH MỤC</span>
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
                <div class="col-lg-12">
                    <div class="filter-category-container">
                        <div class="filter__category-wrapper">
                            <button class="btn filter__btn filter__btn--style-1 js-checked" type="button"
                                data-filter="*">Tất cả</button>
                        </div>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="filter__category-wrapper">
                                <button class="btn filter__btn filter__btn--style-1" type="button"
                                    data-filter=".<?php echo e($category->category_id); ?>"><?php echo e($category->category_name); ?></button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="filter__grid-wrapper u-s-m-t-30">
                        <div class="row">
                        
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $productByCategory = $category->products->merge($category->childrenProducts)->take(2);
                            ?>
                            <?php $__currentLoopData = $productByCategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30 filter__item <?php echo e($category->category_id); ?>">
                                <div class="product-o product-o--hover-on product-o--radius">
                                    <div class="product-o__wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="<?php echo e(asset($product->product_image_path)); ?>"
                                                alt=""></a>
                                        <div class="product-o__action-wrap">
                                            <ul class="product-o__action-list">
                                                <li>

                                                    <a data-modal="modal" data-modal-id="#<?php echo e($product->product_slug); ?>"
                                                        data-tooltip="tooltip" data-placement="top"
                                                        title="Xem nhanh"><i class="fas fa-search-plus"></i></a>
                                                </li>
                                                <li>
                                                    <form method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <input class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_<?php echo e($product->product_id); ?>" type="hidden" name="product_quantity" value="1"/>
                                                        <input type="hidden" class="cart_product_id_<?php echo e($product->product_id); ?>" value="<?php echo e($product->product_id); ?>"/>
                
                                                        <button class="btn btn--e-brand btn-add-cart btn-add-cart-home" type="button" data-modal="modal" data-modal-id="#add-to-cart-<?php echo e($product->product_slug); ?>" data-tooltip="tooltip" data-placement="top" data-id_product="<?php echo e($product->product_id); ?>" name="add_cart"><i class="fas fa-plus-circle fa-add-cart"></i></button>
                                                    </form>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Thêm danh sách yêu thích"><i class="fas fa-heart"></i></a>
                                                </li>
                                                <li>

                                                    <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                        title="Liên hệ khi giảm giá"><i
                                                            class="fas fa-envelope"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <span class="product-o__category">

                                        <a href="<?php echo e(route('home.category', ['category_product_slug' => $category->category_product_slug])); ?>"><?php echo e($category->category_name); ?></a></span>

                                    <span class="product-o__name">

                                        <a href="<?php echo e(route('product.detail', ['product_slug' => $product->product_slug])); ?>"><?php echo e($product->product_name); ?></a></span>
                                    <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i><i
                                            class="fas fa-star"></i><i class="fas fa-star"></i>

                                        <span class="product-o__review">(19)</span>
                                    </div>

                                    <span class="product-o__price"><?php echo e(number_format($product->product_price)); ?> VNĐ</span>

                                        
                                    </span>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="load-more">

                        <button class="btn btn--e-brand" type="button">Còn nữa</button>
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

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">SẢN PHẨM GIẢM GIÁ HOT</h1>

                        <span class="section__span u-c-silver">NHANH TAY MUA NHANH KẺO HẾT. SỐ LƯỢNG CÓ HẠN.</span>

                        <span class="section__span u-c-silver">NHANH CHÓNG THÊM VÀO GIỎ HÀNG.</span>
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
                <div class="col-lg-6 col-md-6 u-s-m-b-30">
                    <div class="product-o product-o--radius product-o--hover-off u-h-100">
                        <div class="product-o__wrap">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                <img class="aspect__img" src="<?php echo e(asset('frontend/images/product/electronic/product11.jpg')); ?>" alt=""></a>
                            <div class="product-o__special-count-wrap">
                                <div class="countdown countdown--style-special" data-countdown="2021/12/01">
                                </div>
                            </div>
                            <div class="product-o__action-wrap">
                                <ul class="product-o__action-list">
                                    <li>

                                        <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip"
                                            data-placement="top" title="Quick View"><i
                                                class="fas fa-search-plus"></i></a>
                                    </li>
                                    <li>

                                        <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip"
                                            data-placement="top" title="Add to Cart"><i
                                                class="fas fa-plus-circle"></i></a>
                                    </li>
                                    <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                            title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    </li>
                                    <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                            title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <span class="product-o__category">

                            <a href="shop-side-version-2.html">Electronics</a></span>

                        <span class="product-o__name">

                            <a href="product-detail.html">DJI Phantom Drone 4k</a></span>
                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i>

                            <span class="product-o__review">(2)</span>
                        </div>

                        <span class="product-o__price">$125.00

                            <span class="product-o__discount">$160.00</span></span>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 u-s-m-b-30">
                    <div class="product-o product-o--radius product-o--hover-off u-h-100">
                        <div class="product-o__wrap">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                <img class="aspect__img" src="<?php echo e(asset('frontend/images/product/electronic/product12.jpg')); ?>" alt=""></a>
                            <div class="product-o__special-count-wrap">
                                <div class="countdown countdown--style-special" data-countdown="2021/12/01">
                                </div>
                            </div>
                            <div class="product-o__action-wrap">
                                <ul class="product-o__action-list">
                                    <li>

                                        <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip"
                                            data-placement="top" title="Quick View"><i
                                                class="fas fa-search-plus"></i></a>
                                    </li>
                                    <li>

                                        <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip"
                                            data-placement="top" title="Add to Cart"><i
                                                class="fas fa-plus-circle"></i></a>
                                    </li>
                                    <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                            title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                    </li>
                                    <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                            title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <span class="product-o__category">

                            <a href="shop-side-version-2.html">Electronics</a></span>

                        <span class="product-o__name">

                            <a href="product-detail.html">DJI Phantom Drone 2k</a></span>
                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star"></i>

                            <span class="product-o__review">(2)</span>
                        </div>

                        <span class="product-o__price">$125.00

                            <span class="product-o__discount">$160.00</span></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 3 ======-->


<!--====== Section 4 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">SẢN PHẨM MỚI NHẤT</h1>
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
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="u-s-m-b-30">
                        <div class="product-o product-o--hover-on">
                            <div class="product-o__wrap">

                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(route('product.detail', ['product_slug' => $product->product_slug])); ?>">

                                    <img class="aspect__img" src="<?php echo e(asset($product->product_image_path)); ?>" alt="<?php echo e($product->product_name); ?>"></a>
                                <div class="product-o__action-wrap">
                                    <ul class="product-o__action-list">
                                        <li>

                                            <a data-modal="modal" data-modal-id="#<?php echo e($product->product_slug); ?>" data-tooltip="tooltip"
                                                data-placement="top" title="Xem nhanh"><i
                                                    class="fas fa-search-plus"></i></a>
                                        </li>
                                        <li>
                                            <form method="POST">
                                                <?php echo csrf_field(); ?>
                                                <input class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_<?php echo e($product->product_id); ?>" type="hidden" name="product_quantity" value="1"/>
                                                <input type="hidden" class="cart_product_id_<?php echo e($product->product_id); ?>" value="<?php echo e($product->product_id); ?>"/>
        
                                                <button class="btn btn--e-brand btn-add-cart btn-add-cart-home" type="button" data-modal="modal" data-modal-id="#add-to-cart-<?php echo e($product->product_slug); ?>" data-tooltip="tooltip" data-placement="top" data-id_product="<?php echo e($product->product_id); ?>" name="add_cart"><i class="fas fa-plus-circle fa-add-cart"></i></button>
                                            </form>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                title="Thêm vào danh sách yêu thích"><i class="fas fa-heart"></i></a>
                                        </li>
                                        <li>

                                            <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                                title="Email cho tôi khi giảm giá"><i
                                                    class="fas fa-envelope"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <span class="product-o__category">

                                <a href="<?php echo e(route('home.category', ['category_product_slug' => $category->category_product_slug])); ?>"><?php echo e($product->category->category_name); ?></a></span>

                            <span class="product-o__name">

                                <a href="<?php echo e(route('product.detail', ['product_slug' => $product->product_slug])); ?>"><?php echo e($product->product_name); ?></a></span>
                            <div class="product-o__rating gl-rating-style"><i class="far fa-star"></i><i
                                    class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i
                                    class="far fa-star"></i>

                                <span class="product-o__review">(0)</span>
                            </div>

                            <span class="product-o__price"><?php echo e(number_format($product->product_price)); ?> VNĐ

                                
                            </span>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 4 ======-->


<!--====== Section 5 ======-->
<div class="banner-bg">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-bg__countdown">
                        <div class="countdown countdown--style-banner" data-countdown="2021/09/01"></div>
                    </div>
                    <div class="banner-bg__wrap">
                        <div class="banner-bg__text-1">

                            <span class="u-c-white">Mua sắm thỏa ga</span>

                            <span class="u-c-secondary">Không lo tiền ship</span>
                        </div>
                        <div class="banner-bg__text-2">

                            <span class="u-c-secondary">Chương trình đã bắt đầu</span>

                            <span class="u-c-white">Đừng quên!</span>
                        </div>

                        <span class="banner-bg__text-block banner-bg__text-3 u-c-secondary">Miễn phí vận chuyển khi mua từ 2 sản phẩm!</span>

                        <a class="banner-bg__shop-now btn--e-secondary" href="shop-side-version-2.html">Mua sắm ngay!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 5 ======-->


<!--====== Section 6 ======-->
<div class="u-s-p-y-60">

    <!--====== Section Intro ======-->
    <div class="section__intro u-s-m-b-46">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section__text-wrap">
                        <h1 class="section__heading u-c-secondary u-s-m-b-12">SẢN PHẨM NỔI BẬT</h1>

                        <span class="section__span u-c-silver">TOP SẢN PHẨM BÁN CHẠY</span>
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
                <?php $__currentLoopData = $top_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="product-o product-o--hover-on u-h-100">
                        <div class="product-o__wrap">

                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="<?php echo e(route('product.detail', ['product_slug' => $product->product_slug])); ?>">

                                <img class="aspect__img" src="<?php echo e(asset($product->product_image_path)); ?>" alt="<?php echo e($product->product_name); ?>"></a>
                            <div class="product-o__action-wrap">
                                <ul class="product-o__action-list">
                                    <li>

                                        <a data-modal="modal" data-modal-id="#<?php echo e($product->product_slug); ?>" data-tooltip="tooltip"
                                            data-placement="top" title="Xem nhanh"><i
                                                class="fas fa-search-plus"></i></a>
                                    </li>
                                    <li>
                                        <form method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_<?php echo e($product->product_id); ?>" type="hidden" name="product_quantity" value="1"/>
                                            <input type="hidden" class="cart_product_id_<?php echo e($product->product_id); ?>" value="<?php echo e($product->product_id); ?>"/>
    
                                            <button class="btn btn--e-brand btn-add-cart btn-add-cart-home" type="button" data-modal="modal" data-modal-id="#add-to-cart-<?php echo e($product->product_slug); ?>" data-tooltip="tooltip" data-placement="top" data-id_product="<?php echo e($product->product_id); ?>" name="add_cart"><i class="fas fa-plus-circle fa-add-cart"></i></button>
                                        </form>
                                    </li>
                                    <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                            title="Thêm vào danh sách yêu thích"><i class="fas fa-heart"></i></a>
                                    </li>
                                    <li>

                                        <a href="signin.html" data-tooltip="tooltip" data-placement="top"
                                            title="Email cho tôi khi giảm giá"><i class="fas fa-envelope"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <span class="product-o__category">

                            <a href="<?php echo e(route('home.category', ['category_product_slug' => $category->category_product_slug])); ?>"><?php echo e($product->category->category_name); ?></a></span>

                        <span class="product-o__name">

                            <a href="<?php echo e(route('product.detail', ['product_slug' => $product->product_slug])); ?>"><?php echo e($product->product_name); ?></a></span>
                        <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i
                                class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i
                                class="fas fa-star-half-alt"></i>

                            <span class="product-o__review">(23)</span>
                        </div>

                        <span class="product-o__price"><?php echo e(number_format($product->product_price)); ?> VNĐ

                            
                        </span>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 6 ======-->


<!--====== Section 7 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                    <a class="promotion" href="shop-side-version-2.html">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img promotion__img" src="<?php echo e(asset('frontend/images/promo/promo-img-1.jpg')); ?>" alt="">
                        </div>
                        <div class="promotion__content">
                            <div class="promotion__text-wrap">
                                <div class="promotion__text-1">

                                    <span class="u-c-secondary">ĐIỆN THOẠI HÀNG ĐẦU</span>
                                </div>
                                <div class="promotion__text-2">

                                    <span class="u-c-secondary">Mua Sắm</span>

                                    <span class="u-c-brand">NGAY</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                    <a class="promotion" href="shop-side-version-2.html">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img promotion__img" src="<?php echo e(asset('frontend/images/promo/promo-img-2.jpg')); ?>" alt="">
                        </div>
                        <div class="promotion__content">
                            <div class="promotion__text-wrap">
                                <div class="promotion__text-1">

                                    <span class="u-c-secondary">CHƠI GAME GIẢI TRÍ</span>

                                    <span class="u-c-brand">HOT</span>
                                </div>
                                <div class="promotion__text-2">

                                    <span class="u-c-secondary">TÌM HIỂU</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 u-s-m-b-30">

                    <a class="promotion" href="shop-side-version-2.html">
                        <div class="aspect aspect--bg-grey aspect--square">

                            <img class="aspect__img promotion__img" src="<?php echo e(asset('frontend/images/promo/promo-img-3.jpg')); ?>" alt="">
                        </div>
                        <div class="promotion__content">
                            <div class="promotion__text-wrap">
                                <div class="promotion__text-1">

                                    <span class="u-c-secondary">THIẾT BỊ LIVESTREAM</span>
                                </div>
                                <div class="promotion__text-2">

                                    <span class="u-c-brand">HOT HOT HOT</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 7 ======-->


<!--====== Section 8 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="column-product">

                        <span class="column-product__title u-c-secondary u-s-m-b-25">SPECIAL PRODUCTS</span>
                        <ul class="column-product__list">
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product23.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 15 Ram 16GB</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product24.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 13 Ram 16GB</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product25.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 15 Ram 8GB</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="column-product">

                        <span class="column-product__title u-c-secondary u-s-m-b-25">WEEKLY PRODUCTS</span>
                        <ul class="column-product__list">
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product26.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 10 Ram 16GB</a></span>

                                        <span class="product-l__price">$125.00

                                            <span class="product-l__discount">$160</span></span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product27.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 15 Ram 8GB</a></span>

                                        <span class="product-l__price">$125.00

                                            <span class="product-l__discount">$160</span></span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product28.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 15 Ultra Ram
                                                16GB</a></span>

                                        <span class="product-l__price">$125.00

                                            <span class="product-l__discount">$160</span></span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                    <div class="column-product">

                        <span class="column-product__title u-c-secondary u-s-m-b-25">FLASH PRODUCTS</span>
                        <ul class="column-product__list">
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product29.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">
                                        <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i></div>

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 20 Ultra Ram
                                                16GB</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product30.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">
                                        <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i></div>

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 11 Ultra Ram
                                                16GB</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                            <li class="column-product__item">
                                <div class="product-l">
                                    <div class="product-l__img-wrap">

                                        <a class="aspect aspect--bg-grey aspect--square u-d-block product-l__link"
                                            href="product-detail.html">

                                            <img class="aspect__img" src="images/product/electronic/product31.jpg"
                                                alt=""></a>
                                    </div>
                                    <div class="product-l__info-wrap">
                                        <div class="product-l__rating gl-rating-style"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="far fa-star"></i><i class="far fa-star"></i></div>

                                        <span class="product-l__category">

                                            <a href="shop-side-version-2.html">Electronics</a></span>

                                        <span class="product-l__name">

                                            <a href="product-detail.html">Razor Gear 10 Ultra Ram
                                                16GB</a></span>

                                        <span class="product-l__price">$125.00</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 8 ======-->


<!--====== Section 9 ======-->
<div class="u-s-p-b-60">

    <!--====== Section Content ======-->
    <div class="section__content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                    <div class="service u-h-100">
                        <div class="service__icon"><i class="fas fa-truck"></i></div>
                        <div class="service__info-wrap">

                            <span class="service__info-text-1">Free Shipping</span>

                            <span class="service__info-text-2">Free shipping on all US order or order above
                                $200</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                    <div class="service u-h-100">
                        <div class="service__icon"><i class="fas fa-redo"></i></div>
                        <div class="service__info-wrap">

                            <span class="service__info-text-1">Shop with Confidence</span>

                            <span class="service__info-text-2">Our Protection covers your purchase from
                                click to delivery</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                    <div class="service u-h-100">
                        <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                        <div class="service__info-wrap">

                            <span class="service__info-text-1">24/7 Help Center</span>

                            <span class="service__info-text-2">Round-the-clock assistance for a smooth
                                shopping experience</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section Content ======-->
</div>
<!--====== End - Section 9 ======-->


<!--====== Section 10 ======-->

<!--====== End - Section 10 ======-->


<!--====== Section 11 ======-->

<!--====== End - Section 11 ======-->


        <!--====== Add to Cart Modal ======-->
        
        <!--====== End - Add to Cart Modal ======-->


        <!--====== Newsletter Subscribe Modal ======-->
        
        <!--====== End - Newsletter Subscribe Modal ======-->
        <!--====== End - Modal Section ======-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Ecommere_Project\WhyTech\resources\views/pages/home.blade.php ENDPATH**/ ?>
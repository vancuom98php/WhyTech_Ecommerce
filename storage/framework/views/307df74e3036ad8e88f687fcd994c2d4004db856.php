<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="<?php echo e(asset('frontend/images/favicon.ico')); ?>" type="image/x-icon">

    <title><?php echo e($meta_title); ?></title>

    <!---------Seo--------->
    <meta name="description" content="<?php echo e($meta_desc); ?>">
    <meta name="keywords" content="<?php echo e($meta_keywords); ?>" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="canonical" href="<?php echo e($url_canonical); ?>" />
    <meta name="author" content="">

    <!------------Share fb------------------>
    <meta property="og:url" content="" />
    <meta property="og:type" content="articles" />
    <meta property="og:title" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta property="og:image" content="" />
    <!--//-------Seo--------->

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/vendor.css')); ?>">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/utility.css')); ?>">

    <!--====== App ======-->
    <link rel="stylesheet" href="<?php echo e(asset('frontend/css/app.css')); ?>">
</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="<?php echo e(asset('frontend/images/preloader.png')); ?>" width="250" height="200"
                alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <header class="header--style-1">

            <!--====== Nav 1 ======-->
            <nav class="primary-nav primary-nav-wrapper--border">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">

                        <!--====== Main Logo ======-->

                        <a class="main-logo" href="<?php echo e(url('/')); ?>">

                            <img src="<?php echo e(asset('frontend/images/logo/logo-top-1.png')); ?>" width="182" height="55"
                                alt="WhyTECH"></a>
                        <!--====== End - Main Logo ======-->


                        <!--====== Search Form ======-->
                        <form class="main-form search-area" action="<?php echo e(route('product.search')); ?>" method="GET">
                            <label for="main-search"></label>

                            <input class="input-text input-text--border-radius input-text--style-1" type="text"
                                name="keywords" id="main-search" placeholder="Bạn tìm gì..." autocomplete="off"
                                onfocus="showSearchResult()" onblur="hideSearchResult()">
                            <div id="find-product-ajax">

                            </div>
                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                        </form>
                        <!--====== End - Search Form ======-->

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs"
                                type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Đóng</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left"
                                        title="Tài khoản">

                                        <a><i class="far fa-user-circle"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:140px">
                                            <?php if(session()->has('customer_id')): ?>
                                                <li>
                                                    <a href="dashboard.html"><i
                                                            class="fas fa-user-circle u-s-m-r-6"></i>

                                                        <span><?php echo e(session()->get('customer_name')); ?></span></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(route('checkout.logout-checkout')); ?>"><i
                                                            class="fas fa-lock-open u-s-m-r-6"></i>

                                                        <span>Đăng xuất</span></a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a href="<?php echo e(route('checkout.register-checkout')); ?>"><i
                                                            class="fas fa-user-plus u-s-m-r-6"></i>

                                                        <span>Đăng ký</span></a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo e(route('checkout.login-checkout')); ?>"><i
                                                            class="fas fa-lock u-s-m-r-6"></i>

                                                        <span>Đăng nhập</span></a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left"
                                        title="Cài đặt">

                                        <a><i class="fas fa-user-cog"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            <li class="has-dropdown has-dropdown--ul-right-100">

                                                <a>Ngôn ngữ<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:120px">
                                                    <li>

                                                        <a class="u-c-brand">Tiếng Việt</a>
                                                    </li>
                                                    <li>

                                                        <a>English</a>
                                                    </li>
                                                    <li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                            <li class="has-dropdown has-dropdown--ul-right-100">

                                                <a>Tiền tệ<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:225px">
                                                    <li>

                                                        <a class="u-c-brand">₫ - Việt Nam Đồng</a>
                                                    </li>
                                                    <li>

                                                        <a>$ - US DOLLAR</a>
                                                    </li>
                                                    <li>

                                                        <a>€ - EURO</a>
                                                    </li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Liên hệ">

                                        <a href="tel:+847608195"><i class="fas fa-phone-volume"></i></a>
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Mail">

                                        <a href="mailto:vancuom98.ac@gmail.com"><i class="far fa-envelope"></i></a>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 ======-->


            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation1">

                            <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Đóng</span>

                                <!--====== List ======-->
                                <ul class="ah-list">
                                    <li class="has-dropdown">

                                        <span class="mega-text"><i class="fas fa-bars"></i></span>

                                        <!--====== Mega Menu ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mega-menu">
                                            <div class="mega-menu-wrap">
                                                

                                                
                                                <!--====== End - No Sub Categories ======-->
                                            </div>
                                        </div>
                                        <!--====== End - Mega Menu ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog"
                                type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Đóng</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                                    <li>

                                        <a href="<?php echo e(route('home.shop')); ?>">Mua sắm</a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a>Trang<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:170px">
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a href="<?php echo e(url('/')); ?>">Trang chủ</a>

                                            </li>
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a>Tài khoản<i
                                                        class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:200px">
                                                    <?php if(!session()->has('customer_id')): ?>
                                                        <li>

                                                            <a href="<?php echo e(route('checkout.login-checkout')); ?>">Đăng
                                                                nhập</a>

                                                        </li>
                                                    <?php endif; ?>
                                                    <li>

                                                        <a href="<?php echo e(route('checkout.register-checkout')); ?>">Đăng
                                                            ký</a>
                                                    </li>
                                                    <li>

                                                        <a href="lost-password.html">Quên mật khẩu</a>
                                                    </li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a href="dashboard.html">Quản lý<i
                                                        class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:200px">
                                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                                        <a href="dashboard.html">Tài khoản của tôi<i
                                                                class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                        <!--====== Dropdown ======-->

                                                        <span class="js-menu-toggle"></span>
                                                        <ul style="width:180px">
                                                            <li>
                                                                <a href="dash-my-profile.html">Hồ sơ</a>
                                                            </li>
                                                            <li>
                                                                <a href="dash-edit-profile.html">Chỉnh sửa hồ sơ</a>
                                                            </li>
                                                            <li>
                                                                <a href="dash-address-book.html">Chỉnh sửa địa chỉ</a>
                                                            </li>
                                                            <li>
                                                                <a href="dash-manage-order.html">Xem đơn hàng</a>
                                                            </li>
                                                        </ul>
                                                        <!--====== End - Dropdown ======-->
                                                    </li>
                                                    <li>

                                                        <a href="<?php echo e(route('cart.show')); ?>">Giỏ hàng của tôi</a>
                                                    </li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                            <li>

                                                <a href="<?php echo e(route('cart.show')); ?>">Giỏ hàng</a>
                                            </li>
                                            <li>

                                                <a href="">Yêu thích</a>
                                            </li>
                                            <li>
                                                <?php if(session()->has('customer_id')): ?>
                                                    <a href="<?php echo e(route('checkout.checkout')); ?>">Thanh toán</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('checkout.login-checkout')); ?>">Thanh toán</a>
                                                <?php endif; ?>
                                            </li>
                                            <li>

                                                <a href="faq.html">Câu hỏi</a>
                                            </li>
                                            <li>

                                                <a href="about.html">Giới thiệu</a>
                                            </li>
                                            <li>

                                                <a href="contact.html">Liên hệ</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown">

                                        <a>Diễn đàn<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>
                                                <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="blog-sidebar-none.html">Blog Sidebar None</a>
                                            </li>
                                            <li>
                                                <a href="blog-masonry.html">Blog Masonry</a>
                                            </li>
                                            <li>
                                                <a href="blog-detail.html">Blog Details</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li>
                                        <a href="shop-side-version-2.html">SẢN PHẨM NỔI BẬT</a>
                                    </li>
                                    <li>
                                        <a href="shop-side-version-2.html">THẺ TẶNG</a>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button
                                class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop"
                                type="button"></button>

                            <span class="total-item-round">2</span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Đóng</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li>

                                        <a href="<?php echo e(url('/')); ?>"><i class="fas fa-home u-c-brand"></i></a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a><i class="far fa-heart"></i>
                                            <span id="wishlist_quantity" style="top: 21%;"
                                                class="total-item-round"></span>
                                        </a>
                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart" id="change-item-wishlist">

                                        </div>

                                    </li>
                                    <li class="has-dropdown">

                                        <a href="<?php echo e(route('cart.show')); ?>" class="mini-cart-shop-link"><i
                                                class="fas fa-shopping-basket"></i>

                                            <?php if(session()->has('cart') && count(session()->get('cart')) > 0): ?>
                                                <span id="cart_quantity_show"
                                                    class="total-item-round"><?php echo e(count(session()->get('cart'))); ?></span>
                                            <?php else: ?>
                                                <span id="cart_quantity_show" class="total-item-round">0</span>
                                            <?php endif; ?>
                                        </a>
                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart" id="change-item-cart">

                                            <!--====== Mini Product Container ======-->
                                            <div class="mini-product-container gl-scroll u-s-m-b-15">
                                                <?php if(session()->has('cart') && count(session()->get('cart')) > 0): ?>
                                                    <?php
                                                        $total = 0;
                                                    ?>
                                                    <?php $__currentLoopData = session()->get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $total += $item['product_quantity'] * $item['product_info']->product_price;
                                                        ?>
                                                        <!--====== Card for mini cart ======-->
                                                        <div class="card-mini-product">
                                                            <div class="mini-product">
                                                                <div class="mini-product__image-wrapper">

                                                                    <a class="mini-product__link"
                                                                        href="<?php echo e(route('product.detail', ['product_slug' => $item['product_info']->product_slug])); ?>">

                                                                        <img class="u-img-fluid"
                                                                            src="<?php echo e(asset($item['product_info']->product_image_path)); ?>"
                                                                            alt="<?php echo e($item['product_info']->product_name); ?>"></a>
                                                                </div>
                                                                <div class="mini-product__info-wrapper">

                                                                    <span class="mini-product__category">

                                                                        <a
                                                                            href="<?php echo e(route('home.category', ['category_product_slug' => $item['product_info']->category->category_product_slug])); ?>"><?php echo e($item['product_info']->category->category_name); ?></a></span>

                                                                    <span class="mini-product__name">

                                                                        <a
                                                                            href="<?php echo e(route('product.detail', ['product_slug' => $item['product_info']->product_slug])); ?>"><?php echo e($item['product_info']->product_name); ?></a></span>

                                                                    <span
                                                                        class="mini-product__quantity"><?php echo e($item['product_quantity']); ?>

                                                                        x </span>

                                                                    <span
                                                                        class="mini-product__price"><?php echo e(number_format($item['product_info']->product_price)); ?>

                                                                        VNĐ</span>
                                                                </div>
                                                            </div>

                                                            <a class="mini-product__delete-link far fa-trash-alt"
                                                                data-id="<?php echo e($item['session_id']); ?>"></a>
                                                        </div>
                                                        <!--====== End - Card for mini cart ======-->
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <div class="card-mini-product">
                                                        <div class="mini-product">
                                                            <img src="<?php echo e(asset('frontend/images/empty-cart.png')); ?>"
                                                                alt="Empty Cart" width="100%">
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                            <!--====== End - Mini Product Container ======-->


                                            <!--====== Mini Product Statistics ======-->
                                            <div class="mini-product-stat">
                                                <?php if(session()->has('cart') && count(session()->get('cart')) > 0): ?>
                                                    <div class="mini-total">

                                                        <span class="subtotal-text">TỔNG GIÁ TRỊ</span>

                                                        <span class="subtotal-value"><?php echo e(number_format($total)); ?>

                                                            VNĐ</span>
                                                    </div>
                                                <?php endif; ?>
                                                <div class="mini-action">
                                                    <?php if(session()->has('customer_id')): ?>
                                                        <a class="mini-link btn--e-brand-b-2"
                                                            href="<?php echo e(route('checkout.checkout')); ?>">TIẾN HÀNH THANH
                                                            TOÁN</a>
                                                    <?php else: ?>
                                                        <a class="mini-link btn--e-brand-b-2"
                                                            href="<?php echo e(route('checkout.login-checkout')); ?>">TIẾN HÀNH
                                                            THANH TOÁN</a>
                                                    <?php endif; ?>

                                                    <a class="mini-link btn--e-transparent-secondary-b-2"
                                                        href="<?php echo e(route('cart.show')); ?>">XEM GIỎ HÀNG</a>
                                                </div>
                                            </div>
                                            <!--====== End - Mini Product Statistics ======-->
                                        </div>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
        </header>
        <!--====== End - Main Header ======-->


        <!--====== App Content ======-->
        <div class="app-content">

            <!--====== Primary Slider ======-->

            <?php echo $__env->yieldContent('slider'); ?>

            <!--====== End - Primary Slider ======-->

            <?php echo $__env->yieldContent('home_content'); ?>

            <!--====== Primary Slider ======-->
            <?php echo $__env->yieldContent('sidebar'); ?>

            <?php echo $__env->yieldContent('shopping_content'); ?>

            <!--====== End - Primary Slider ======-->

        </div>
        <!--====== End - App Content ======-->


        <!--====== Main Footer ======-->
        <footer>
            <div class="outer-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Contact Us</span>
                                <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                                    <span>4247 Ashford Drive Virginia VA-20006 USA</span>
                                </div>
                                <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                                    <span>(+0) 900 901 904</span>
                                </div>
                                <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                                    <span>contact@domain.com</span>
                                </div>
                                <div class="outer-footer__social">
                                    <ul>
                                        <li>

                                            <a class="s-fb--color-hover" href="#"><i
                                                    class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-youtube--color-hover" href="#"><i
                                                    class="fab fa-youtube"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-insta--color-hover" href="#"><i
                                                    class="fab fa-instagram"></i></a>
                                        </li>
                                        <li>

                                            <a class="s-gplus--color-hover" href="#"><i
                                                    class="fab fa-google-plus-g"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">

                                        <span class="outer-footer__content-title">Information</span>
                                        <div class="outer-footer__list-wrap">
                                            <ul>
                                                <li>

                                                    <a href="cart.html">Cart</a>
                                                </li>
                                                <li>

                                                    <a href="dashboard.html">Account</a>
                                                </li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Manufacturer</a>
                                                </li>
                                                <li>

                                                    <a href="dash-payment-option.html">Finance</a>
                                                </li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Shop</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">
                                        <div class="outer-footer__list-wrap">

                                            <span class="outer-footer__content-title">Our Company</span>
                                            <ul>
                                                <li>

                                                    <a href="about.html">About us</a>
                                                </li>
                                                <li>

                                                    <a href="contact.html">Contact Us</a>
                                                </li>
                                                <li>

                                                    <a href="index.html">Sitemap</a>
                                                </li>
                                                <li>

                                                    <a href="dash-my-order.html">Delivery</a>
                                                </li>
                                                <li>

                                                    <a href="shop-side-version-2.html">Store</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="outer-footer__content">

                                <span class="outer-footer__content-title">Join our Newsletter</span>
                                <form class="newsletter">
                                    <div class="u-s-m-b-15">
                                        <div class="radio-box newsletter__radio">

                                            <input type="radio" id="male" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="male">Male</label>
                                            </div>
                                        </div>
                                        <div class="radio-box newsletter__radio">

                                            <input type="radio" id="female" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="newsletter__group">

                                        <label for="newsletter"></label>

                                        <input class="input-text input-text--only-white" type="text" id="newsletter"
                                            placeholder="Enter your Email">

                                        <button class="btn btn--e-brand newsletter__btn"
                                            type="submit">SUBSCRIBE</button>
                                    </div>

                                    <span class="newsletter__text">Subscribe to the mailing list to receive updates on
                                        promotions, new arrivals, discount and coupons.</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">

                                    <span>Copyright © 2018</span>

                                    <a href="index.html">Reshop</a>

                                    <span>All Right Reserved</span>
                                </div>
                                <div class="lower-footer__payment">
                                    <ul>
                                        <li><i class="fab fa-cc-stripe"></i></li>
                                        <li><i class="fab fa-cc-paypal"></i></li>
                                        <li><i class="fab fa-cc-mastercard"></i></li>
                                        <li><i class="fab fa-cc-visa"></i></li>
                                        <li><i class="fab fa-cc-discover"></i></li>
                                        <li><i class="fab fa-cc-amex"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--====== Modal Section ======-->


        <!--====== Quick Look Modal ======-->
        <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="<?php echo e($product->product_slug); ?>">
                <div class="modal-dialog modal-dialog-centered" style="width: 100%; max-width: 991px;">
                    <div class="modal-content modal--shadow">

                        <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-5">

                                    <!--====== Product Breadcrumb ======-->
                                    <div class="pd-breadcrumb u-s-m-b-30">
                                        <ul class="pd-breadcrumb__list">
                                            <li class="has-separator">

                                                <a href="<?php echo e(url('/')); ?>">Trang chủ</a>
                                            </li>
                                            
                                            <li class="is-marked">

                                                <a id="wishlist_categoryurl_<?php echo e($product->product_id); ?>"
                                                    href="<?php echo e(route('home.category', ['category_product_slug' => $product->category->category_product_slug])); ?>"><?php echo e($product->category->category_name); ?></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--====== End - Product Breadcrumb ======-->


                                    <!--====== Product Detail ======-->
                                    <div class="pd u-s-m-b-30">
                                        <div class="pd-wrap">
                                            <div id="js-product-detail-modal">
                                                <div>

                                                    <img id="wishlist_productimage_<?php echo e($product->product_id); ?>" class="u-img-fluid"
                                                        src="<?php echo e(asset($product->product_image_path)); ?>"
                                                        alt="<?php echo e($product->product_name); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Product Detail ======-->
                                </div>
                                <div class="col-lg-7">

                                    <!--====== Product Right Side Details ======-->
                                    <div class="pd-detail">
                                        <div>

                                            <a id="wishlist_producturl_<?php echo e($product->product_id); ?>"
                                                href="<?php echo e(route('product.detail', ['product_slug' => $product->product_slug])); ?>"
                                                class="pd-detail__name"><?php echo e($product->product_name); ?></a>
                                        </div>
                                        <div>
                                            <div class="pd-detail__inline">

                                                <span
                                                    class="pd-detail__price"><?php echo e(number_format($product->product_price)); ?>

                                                    VNĐ</span>

                                                
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__rating gl-rating-style">
                                                <?php
                                                    $ratingAvg = $product->comments->avg('rating');
                                                ?>
                                                <?php for($i = 0; $i < floor($ratingAvg); $i++): ?>
                                                    <i class="fas fa-star"></i>
                                                <?php endfor; ?>
                                                <?php if($ratingAvg - (int) $ratingAvg > 0 && $ratingAvg - (int) $ratingAvg <= 0.5): ?>
                                                    <i class="fas fa-star-half-alt"></i>
                                                <?php elseif($ratingAvg - (int) $ratingAvg == 0): ?>
                                                <?php else: ?>
                                                    <i class="fas fa-star"></i>
                                                <?php endif; ?>

                                                <span class="pd-detail__review u-s-m-l-4">

                                                    <a href="product-detail.html"><?php echo e($product->comments->where('comment_parent_comment', 0)->count()); ?>

                                                        Đánh giá</a></span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__stock">Mới (100%)</span>

                                                <span class="pd-detail__left">Còn hàng</span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">

                                            <span class="pd-detail__preview-desc"><?php echo $product->product_desc; ?></span>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__click-wrap"><i
                                                        class="far fa-heart u-s-m-r-6"></i>

                                                    <input type="hidden"
                                                        id="wishlist_productname_<?php echo e($product->product_id); ?>"
                                                        value="<?php echo e($product->product_name); ?>">
                                                    <input type="hidden"
                                                        id="wishlist_productprice_<?php echo e($product->product_id); ?>"
                                                        value="<?php echo e(number_format($product->product_price)); ?> VNĐ">
                                                    <input type="hidden"
                                                        id="wishlist_category_<?php echo e($product->product_id); ?>"
                                                        value="<?php echo e($product->category->category_name); ?>">

                                                    <a onclick="add_wishlist(this.id)"
                                                        id="<?php echo e($product->product_id); ?>">Thêm vào danh sách yêu
                                                        thích</a>

                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__inline">

                                                <span class="pd-detail__click-wrap"><i
                                                        class="far fa-envelope u-s-m-r-6"></i>

                                                    <a href="signin.html">Email cho tôi khi sản phẩm giảm giá</a>

                                                    <span class="pd-detail__click-count">(20)</span></span>
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <ul class="pd-social-list">
                                                <li>

                                                    <a class="s-fb--color-hover" href="#"><i
                                                            class="fab fa-facebook-f"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-tw--color-hover" href="#"><i
                                                            class="fab fa-twitter"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-insta--color-hover" href="#"><i
                                                            class="fab fa-instagram"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-wa--color-hover" href="#"><i
                                                            class="fab fa-whatsapp"></i></a>
                                                </li>
                                                <li>

                                                    <a class="s-gplus--color-hover" href="#"><i
                                                            class="fab fa-google-plus-g"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <form class="pd-detail__form" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <div class="pd-detail-inline-2">
                                                    <div class="u-s-m-b-15">

                                                        <!--====== Input Counter ======-->
                                                        <div class="input-counter">

                                                            <span class="input-counter__minus fas fa-minus"></span>

                                                            <input
                                                                class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_<?php echo e($product->product_id); ?>"
                                                                type="text" name="product_quantity" data-min="1"
                                                                data-max="1000">

                                                            <span class="input-counter__plus fas fa-plus"></span>

                                                        </div>
                                                        <!--====== End - Input Counter ======-->
                                                    </div>
                                                    <div class="u-s-m-b-15">
                                                        <input type="hidden"
                                                            class="cart_product_id_<?php echo e($product->product_id); ?>"
                                                            value="<?php echo e($product->product_id); ?>" />

                                                        <button class="btn btn--e-brand-b-2 btn-add-cart" type="button"
                                                            data-modal="modal"
                                                            data-modal-id="#add-to-cart-<?php echo e($product->product_slug); ?>"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            data-id_product="<?php echo e($product->product_id); ?>"
                                                            name="add_cart">Thêm vào giỏ hàng</button>
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

                                                    <span>Hoàn tiền đầy đủ nếu bạn không nhận được đơn hàng của
                                                        mình.</span>
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
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!--====== End - Quick Look Modal ======-->

        <!--====== Add to Cart Modal ======-->
        <?php $__currentLoopData = $all_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="modal fade" id="add-to-cart-<?php echo e($product->product_slug); ?>">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content modal-radius modal-shadow">

                        <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="success u-s-m-b-30">
                                        <div class="success__text-wrap" style="width: 230px;"><i
                                                class="fas fa-check"></i>

                                            <span>Thêm sản phẩm thành công!</span>
                                        </div>
                                        <div class="success__img-wrap">

                                            <img class="u-img-fluid"
                                                src="<?php echo e(asset($product->product_image_path)); ?>"
                                                alt="<?php echo e($product->product_name); ?>">
                                        </div>
                                        <div class="success__info-wrap">

                                            <span class="success__name"><?php echo e($product->product_name); ?></span>

                                            <span class="success__quantity"></span>

                                            <span
                                                class="success__price"><?php echo e(number_format($product->product_price)); ?>

                                                VNĐ</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="s-option">

                                        <span class="s-option__text"></span>
                                        <div class="s-option__link-box">

                                            <a class="s-option__link btn--e-white-brand-shadow"
                                                data-dismiss="modal">TIẾP TỤC MUA SẮM</a>

                                            <a class="s-option__link btn--e-white-brand-shadow"
                                                href="<?php echo e(route('cart.show')); ?>">XEM GIỎ HÀNG</a>
                                            <?php if(!session()->has('customer_id')): ?>
                                                <a class="s-option__link btn--e-brand-shadow"
                                                    href="<?php echo e(route('checkout.login-checkout')); ?>">TIẾN HÀNH THANH
                                                    TOÁN</a>
                                        </div>
                                    <?php else: ?>
                                        <a class="s-option__link btn--e-brand-shadow"
                                            href="<?php echo e(route('checkout.checkout')); ?>">TIẾN HÀNH THANH TOÁN</a>
                                    </div>
        <?php endif; ?>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <!--====== End - Add to Cart Modal ======-->

    <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->


    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="<?php echo e(asset('frontend/js/vendor.js')); ?>"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="<?php echo e(asset('frontend/js/jquery.shopnav.js')); ?>"></script>

    <!--====== App ======-->
    <script src="<?php echo e(asset('frontend/js/app.js')); ?>"></script>

    <!--====== Alertify ======-->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <!-- Sweetalert2 -->
    <script src="<?php echo e(asset('frontend/js/sweetalert2@9.js')); ?>"></script>
    <!--====== AJAX Js ======-->
    <script src="<?php echo e(asset('frontend/js/ajax.js')); ?>"></script>

    <!--====== Autocomplete Search ======-->
    <script>
        $("body").on("keyup", "#main-search", function() {
            let keywords = $("#main-search").val();
            let urlToRedirect = '/home/find';

            if (keywords.length > 0) {
                $.ajax({
                    url: urlToRedirect,
                    method: 'GET',
                    data: {
                        keywords: keywords,
                    },
                    success: function(response) {
                        $('#find-product-ajax').html(response);
                    }
                });
            } else
                $('#find-product-ajax').html("");
        })
    </script>

    <script type="text/javascript">
        function view() {
            output = '';

            if (localStorage.getItem('data') != null) {
                let data = JSON.parse(localStorage.getItem('data'));
                data.reverse();

                if (data.length > 0) {
                    output += '<div class="mini-product-container gl-scroll u-s-m-b-15">';

                    for (i = 0; i < data.length; i++) {

                        let name = data[i].name;
                        let price = data[i].price;
                        let image = data[i].image;
                        let url = data[i].url;
                        let category = data[i].category;
                        let category_url = data[i].category_url;
                        let index = data.length - 1 - i;

                        output +=
                            '<div class="card-mini-product"><div class="mini-product"><div class="mini-product__image-wrapper">';
                        output += '<a class="mini-product__link" href="' + url + '">';
                        output += '<img class="u-img-fluid" src="' + image + '" alt="' + name + '"></a>';
                        output += '</div><div class="mini-product__info-wrapper"><span class="mini-product__category">';
                        output += '<a href="' + category_url + '">' + category +
                            '</a></span><span class="mini-product__name">';
                        output += '<a href="' + url + '">' + name + '</a></span>';
                        output += '<span class="mini-product__price">' + price + '</span></div></div>';
                        output += '<a class="mini-product__delete-link far fa-trash-alt" id="' + index +
                            '" onclick="delete_wishlist(this.id)"></a></div>';
                    }
                    output += '</div>';

                } else {
                    output +=
                        '<div class="card-mini-product"><div class="mini-product"><img src="<?php echo e(asset('frontend/images/empty_wishlist.png')); ?>" alt="Empty wishlist" width="100%"></div></div>';
                }

                $('#wishlist_quantity').text(data.length);
            } else {
                output +=
                    '<div class="card-mini-product"><div class="mini-product"><img src="<?php echo e(asset('frontend/images/empty_wishlist.png')); ?>" alt="Empty wishlist" width="100%"></div></div>';
                $('#wishlist_quantity').text(0);
            }

            $("#change-item-wishlist").empty();
            $("#change-item-wishlist").append(output);
        }

        view();

        function add_wishlist(clicked_id) {

            let id = clicked_id;
            let name = document.getElementById('wishlist_productname_' + id).value;
            let price = document.getElementById('wishlist_productprice_' + id).value;
            let image = document.getElementById('wishlist_productimage_' + id).src;
            let url = document.getElementById('wishlist_producturl_' + id).href;
            let category = document.getElementById('wishlist_category_' + id).value;
            let category_url = document.getElementById('wishlist_categoryurl_' + id).href;

            let newItem = {
                'url': url,
                'id': id,
                'name': name,
                'price': price,
                'image': image,
                'category': category,
                'category_url': category_url
            }

            if (localStorage.getItem('data') == null) {
                localStorage.setItem('data', '[]');
            }

            let old_data = JSON.parse(localStorage.getItem('data'));

            let matches = $.grep(old_data, function(obj) {
                return obj.id == id;
            })

            if (matches.length) {
                Swal.fire({
                    icon: 'error',
                    title: 'Lỗi...',
                    text: 'Sản phẩm này đã có trong danh sách yêu thích, bạn không thể thêm!',
                });
            } else {
                old_data.push(newItem);
                Swal.fire(
                    'Xác nhận!',
                    'Đã thêm sản phẩm này vào danh sách yêu thích!',
                    'success'
                );
            }

            localStorage.setItem('data', JSON.stringify(old_data));

            view();
        }

        function delete_wishlist(clicked_id) {
            let id = clicked_id;
            let data = JSON.parse(localStorage.getItem('data'));

            data.splice(id, 1);
            localStorage.setItem('data', JSON.stringify(data));

            view();
        }
    </script>

    <script>
        function showSearchResult() {
            $('#find-product-ajax').slideDown();
        }

        function hideSearchResult() {
            $('#find-product-ajax').slideUp();
        }
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a
                                JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>

</body>

</html>
<?php /**PATH D:\xampp\htdocs\Ecommere_Project\WhyTech\resources\views/layout.blade.php ENDPATH**/ ?>
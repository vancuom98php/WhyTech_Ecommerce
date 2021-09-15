<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="shortcut icon" href="{{ asset('frontend/images/favicon.ico') }}" type="image/x-icon">

    <title>{{ $meta_title }}</title>

    <!---------Seo--------->
    <meta name="description" content="{{ $meta_desc }}">
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <link rel="canonical" href="{{ $url_canonical }}" />
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
    <link rel="stylesheet" href="{{ asset('frontend/css/vendor.css') }}">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/utility.css') }}">

    <!--====== App ======-->
    <link rel="stylesheet" href="{{ asset('frontend/css/app.css') }}">
</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="{{ asset('frontend/images/preloader.png') }}" width="250" height="200"
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

                        <a class="main-logo" href="{{ url('/') }}">

                            <img src="{{ asset('frontend/images/logo/logo-top-1.png') }}" width="182" height="55"
                                alt="WhyTECH"></a>
                        <!--====== End - Main Logo ======-->


                        <!--====== Search Form ======-->
                        <form class="main-form search-area" action="{{ route('product.search') }}" method="GET">
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
                                            @if (session()->has('customer_id'))
                                                <li>
                                                    <a href="dashboard.html"><i
                                                            class="fas fa-user-circle u-s-m-r-6"></i>

                                                        <span>{{ session()->get('customer_name') }}</span></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('checkout.logout-checkout') }}"><i
                                                            class="fas fa-lock-open u-s-m-r-6"></i>

                                                        <span>Đăng xuất</span></a>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ route('checkout.register-checkout') }}"><i
                                                            class="fas fa-user-plus u-s-m-r-6"></i>

                                                        <span>Đăng ký</span></a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('checkout.login-checkout') }}"><i
                                                            class="fas fa-lock u-s-m-r-6"></i>

                                                        <span>Đăng nhập</span></a>
                                                </li>
                                            @endif
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
                                                <div class="mega-menu-list">
                                                    <ul>
                                                        <li class="js-active">

                                                            <a href="shop-side-version-2.html"><i
                                                                    class="fas fa-tv u-s-m-r-6"></i>

                                                                <span>Electronics</span></a>

                                                            <span class="js-menu-toggle js-toggle-mark"></span>
                                                        </li>
                                                        <li>

                                                            <a href="shop-side-version-2.html"><i
                                                                    class="fas fa-female u-s-m-r-6"></i>

                                                                <span>Women's Clothing</span></a>

                                                            <span class="js-menu-toggle"></span>
                                                        </li>
                                                        <li>

                                                            <a href="shop-side-version-2.html"><i
                                                                    class="fas fa-male u-s-m-r-6"></i>

                                                                <span>Men's Clothing</span></a>

                                                            <span class="js-menu-toggle"></span>
                                                        </li>
                                                        <li>

                                                            <a href="index.html"><i
                                                                    class="fas fa-utensils u-s-m-r-6"></i>

                                                                <span>Food & Supplies</span></a>

                                                            <span class="js-menu-toggle"></span>
                                                        </li>
                                                        <li>

                                                            <a href="index.html"><i class="fas fa-couch u-s-m-r-6"></i>

                                                                <span>Furniture & Decor</span></a>

                                                            <span class="js-menu-toggle"></span>
                                                        </li>
                                                        <li>

                                                            <a href="index.html"><i
                                                                    class="fas fa-football-ball u-s-m-r-6"></i>

                                                                <span>Sports & Game</span></a>

                                                            <span class="js-menu-toggle"></span>
                                                        </li>
                                                        <li>

                                                            <a href="index.html"><i
                                                                    class="fas fa-heartbeat u-s-m-r-6"></i>

                                                                <span>Beauty & Health</span></a>

                                                            <span class="js-menu-toggle"></span>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!--====== Electronics ======-->
                                                <div class="mega-menu-content js-active">

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">3D PRINTER &
                                                                        SUPPLIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">3d Printer</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">3d Printing
                                                                        Pen</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">3d Printing
                                                                        Accessories</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">3d Printer Module
                                                                        Board</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">HOME AUDIO &
                                                                        VIDEO</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">TV Boxes</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">TC Receiver &
                                                                        Accessories</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Display
                                                                        Dongle</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Home Theater
                                                                        System</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">MEDIA PLAYERS</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Earphones</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Mp3 Players</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Speakers &
                                                                        Radios</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Microphones</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">VIDEO GAME
                                                                        ACCESSORIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Nintendo Video
                                                                        Games Accessories</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Sony Video Games
                                                                        Accessories</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Xbox Video Games
                                                                        Accessories</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">SECURITY &
                                                                        PROTECTION</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Security
                                                                        Cameras</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Alarm System</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Security
                                                                        Gadgets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">CCTV Security &
                                                                        Accessories</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">PHOTOGRAPHY &
                                                                        CAMERA</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Digital
                                                                        Cameras</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Sport Camera &
                                                                        Accessories</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Camera
                                                                        Accessories</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Lenses &
                                                                        Accessories</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">ARDUINO
                                                                        COMPATIBLE</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Raspberry Pi &
                                                                        Orange Pi</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Module Board</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Smart Robot</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Board Kits</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">DSLR Camera</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Nikon Cameras</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Canon Camera</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Sony Camera</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">DSLR Lenses</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">NECESSARY
                                                                        ACCESSORIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Flash Cards</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Memory Cards</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Flash Pins</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Compact Discs</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-9 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-0.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                </div>
                                                <!--====== End - Electronics ======-->


                                                <!--====== Women ======-->
                                                <div class="mega-menu-content">

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-6 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-1.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-2.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">HOT
                                                                        CATEGORIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Dresses</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Blouses &
                                                                        Shirts</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">T-shirts</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Rompers</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">INTIMATES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Bras</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Brief Sets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Bustiers &
                                                                        Corsets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Panties</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">WEDDING &
                                                                        EVENTS</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Wedding
                                                                        Dresses</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Evening
                                                                        Dresses</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Prom Dresses</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Flower
                                                                        Dresses</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">BOTTOMS</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Skirts</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Shorts</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Leggings</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Jeans</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">OUTWEAR</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Blazers</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Basics
                                                                        Jackets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Trench</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Leather &
                                                                        Suede</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">JACKETS</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Denim Jackets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Trucker
                                                                        Jackets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Windbreaker
                                                                        Jackets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Leather
                                                                        Jackets</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">ACCESSORIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Tech
                                                                        Accessories</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Headwear</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Baseball Caps</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Belts</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">OTHER
                                                                        ACCESSORIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Bags</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Wallets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Watches</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Sunglasses</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-9 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-3.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-3 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-4.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                </div>
                                                <!--====== End - Women ======-->


                                                <!--====== Men ======-->
                                                <div class="mega-menu-content">

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-4 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-5.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-6.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-7.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">HOT SALE</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">T-Shirts</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Tank Tops</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Polo</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Shirts</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">OUTWEAR</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Hoodies</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Trench</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Parkas</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Sweaters</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">BOTTOMS</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Casual Pants</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Cargo Pants</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Jeans</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Shorts</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">UNDERWEAR</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Boxers</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Briefs</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Robes</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Socks</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">JACKETS</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Denim Jackets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Trucker
                                                                        Jackets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Windbreaker
                                                                        Jackets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Leather
                                                                        Jackets</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">SUNGLASSES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Pilot</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Wayfarer</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Square</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Round</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">ACCESSORIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Eyewear
                                                                        Frames</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Scarves</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Hats</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Belts</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <ul>
                                                                <li class="mega-list-title">

                                                                    <a href="shop-side-version-2.html">OTHER
                                                                        ACCESSORIES</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Bags</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Wallets</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Watches</a>
                                                                </li>
                                                                <li>

                                                                    <a href="shop-side-version-2.html">Tech
                                                                        Accessories</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <div class="col-lg-6 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-8.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 mega-image">
                                                            <div class="mega-banner">

                                                                <a class="u-d-block"
                                                                    href="shop-side-version-2.html">

                                                                    <img class="u-img-fluid u-d-block"
                                                                        src="images/banners/banner-mega-9.jpg"
                                                                        alt=""></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                </div>
                                                <!--====== End - Men ======-->


                                                <!--====== No Sub Categories ======-->
                                                <div class="mega-menu-content">
                                                    <h5>No Categories</h5>
                                                </div>
                                                <!--====== End - No Sub Categories ======-->


                                                <!--====== No Sub Categories ======-->
                                                <div class="mega-menu-content">
                                                    <h5>No Categories</h5>
                                                </div>
                                                <!--====== End - No Sub Categories ======-->


                                                <!--====== No Sub Categories ======-->
                                                <div class="mega-menu-content">
                                                    <h5>No Categories</h5>
                                                </div>
                                                <!--====== End - No Sub Categories ======-->


                                                <!--====== No Sub Categories ======-->
                                                <div class="mega-menu-content">
                                                    <h5>No Categories</h5>
                                                </div>
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

                                        <a href="{{ route('home.shop') }}">Mua sắm</a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a>Trang<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:170px">
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a href="{{ url('/') }}">Trang chủ</a>

                                            </li>
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a>Tài khoản<i
                                                        class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:200px">
                                                    @if (!session()->has('customer_id'))
                                                        <li>

                                                            <a href="{{ route('checkout.login-checkout') }}">Đăng
                                                                nhập</a>

                                                        </li>
                                                    @endif
                                                    <li>

                                                        <a href="{{ route('checkout.register-checkout') }}">Đăng
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

                                                        <a href="{{ route('cart.show') }}">Giỏ hàng của tôi</a>
                                                    </li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                            <li>

                                                <a href="{{ route('cart.show') }}">Giỏ hàng</a>
                                            </li>
                                            <li>

                                                <a href="wishlist.html">Yêu thích</a>
                                            </li>
                                            <li>
                                                @if (session()->has('customer_id'))
                                                    <a href="{{ route('checkout.checkout') }}">Thanh toán</a>
                                                @else
                                                    <a href="{{ route('checkout.login-checkout') }}">Thanh toán</a>
                                                @endif
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

                                        <a href="{{ url('/') }}"><i class="fas fa-home u-c-brand"></i></a>
                                    </li>
                                    <li>

                                        <a href="wishlist.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a href="{{ route('cart.show') }}" class="mini-cart-shop-link"><i
                                                class="fas fa-shopping-basket"></i></i>

                                            @if (session()->has('cart') && count(session()->get('cart')) > 0)
                                                <span id="cart_quantity_show"
                                                    class="total-item-round">{{ count(session()->get('cart')) }}</span>
                                            @else
                                                <span id="cart_quantity_show" class="total-item-round">0</span>
                                            @endif
                                        </a>
                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart" id="change-item-cart">

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

                                                            <a class="mini-product__delete-link far fa-trash-alt"
                                                                data-id="{{ $item['session_id'] }}"></a>
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

            @yield('slider')

            <!--====== End - Primary Slider ======-->

            @yield('home_content')

            <!--====== Primary Slider ======-->
            @yield('sidebar')

            @yield('shopping_content')

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
        @foreach ($all_products as $product)
            <div class="modal fade" id="{{ $product->product_slug }}">
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

                                                <a href="{{ url('/') }}">Trang chủ</a>
                                            </li>
                                            {{-- <li class="has-separator">

                                            <a href="shop-side-version-2.html">DSLR Cameras</a></li> --}}
                                            <li class="is-marked">

                                                <a
                                                    href="{{ route('home.category', ['category_product_slug' => $product->category->category_product_slug]) }}">{{ $product->category->category_name }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!--====== End - Product Breadcrumb ======-->


                                    <!--====== Product Detail ======-->
                                    <div class="pd u-s-m-b-30">
                                        <div class="pd-wrap">
                                            <div id="js-product-detail-modal">
                                                <div>

                                                    <img class="u-img-fluid"
                                                        src="{{ asset($product->product_image_path) }}"
                                                        alt="{{ $product->product_name }}">
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

                                            <span class="pd-detail__name">{{ $product->product_name }}</span>
                                        </div>
                                        <div>
                                            <div class="pd-detail__inline">

                                                <span
                                                    class="pd-detail__price">{{ number_format($product->product_price) }}
                                                    VNĐ</span>

                                                {{-- <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del> --}}
                                            </div>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <div class="pd-detail__rating gl-rating-style"><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                    class="fas fa-star-half-alt"></i>

                                                <span class="pd-detail__review u-s-m-l-4">

                                                    <a href="product-detail.html">19 Đánh giá</a></span>
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

                                                <span class="pd-detail__click-wrap"><i
                                                        class="far fa-heart u-s-m-r-6"></i>

                                                    <a href="signin.html">Thêm vào danh sách yêu thích</a>

                                                    <span class="pd-detail__click-count">(222)</span></span>
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
                                                @csrf
                                                <div class="pd-detail-inline-2">
                                                    <div class="u-s-m-b-15">

                                                        <!--====== Input Counter ======-->
                                                        <div class="input-counter">

                                                            <span class="input-counter__minus fas fa-minus"></span>

                                                            <input
                                                                class="input-counter__text input-counter--text-primary-style quantity cart_product_qty_{{ $product->product_id }}"
                                                                type="text" name="product_quantity" data-min="1"
                                                                data-max="1000">

                                                            <span class="input-counter__plus fas fa-plus"></span>

                                                        </div>
                                                        <!--====== End - Input Counter ======-->
                                                    </div>
                                                    <div class="u-s-m-b-15">
                                                        <input type="hidden"
                                                            class="cart_product_id_{{ $product->product_id }}"
                                                            value="{{ $product->product_id }}" />

                                                        <button class="btn btn--e-brand-b-2 btn-add-cart" type="button"
                                                            data-modal="modal"
                                                            data-modal-id="#add-to-cart-{{ $product->product_slug }}"
                                                            data-tooltip="tooltip" data-placement="top"
                                                            data-id_product="{{ $product->product_id }}"
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
        @endforeach
        <!--====== End - Quick Look Modal ======-->

        <!--====== Add to Cart Modal ======-->
        @foreach ($all_products as $product)
            <div class="modal fade" id="add-to-cart-{{ $product->product_slug }}">
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
                                                src="{{ asset($product->product_image_path) }}"
                                                alt="{{ $product->product_name }}">
                                        </div>
                                        <div class="success__info-wrap">

                                            <span class="success__name">{{ $product->product_name }}</span>

                                            <span class="success__quantity"></span>

                                            <span
                                                class="success__price">{{ number_format($product->product_price) }}
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
                                                href="{{ route('cart.show') }}">XEM GIỎ HÀNG</a>
                                            @if (!session()->has('customer_id'))
                                                <a class="s-option__link btn--e-brand-shadow"
                                                    href="{{ route('checkout.login-checkout') }}">TIẾN HÀNH THANH
                                                    TOÁN</a>
                                        </div>
                                    @else
                                        <a class="s-option__link btn--e-brand-shadow"
                                            href="{{ route('checkout.checkout') }}">TIẾN HÀNH THANH TOÁN</a>
                                    </div>
        @endif
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    @endforeach

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
    <script src="{{ asset('frontend/js/vendor.js') }}"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="{{ asset('frontend/js/jquery.shopnav.js') }}"></script>

    <!--====== App ======-->
    <script src="{{ asset('frontend/js/app.js') }}"></script>

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
    <script src="{{ asset('frontend/js/sweetalert2@9.js') }}"></script>
    <!--====== AJAX Js ======-->
    <script src="{{ asset('frontend/js/ajax.js') }}"></script>

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

    <script>
        function showSearchResult() {
            $('#find-product-ajax').slideDown();
        }

        function hideSearchResult() {
            $('#find-product-ajax').slideUp();
        }
    </script>

    @yield('scripts')

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

<div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
    <div class="owl-carousel primary-style-1" id="hero-slider">
        @foreach ($sliders as $key => $slider)
            <div class="hero-slide hero-slide--{{ $key+1 }}" style="background-image: url({{ $slider->slider_image }});">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="slider-content slider-content--animation">

                                <span class="content-span-1 u-c-secondary">{{ $slider->slider_name }}</span>

                                <span class="content-span-2 u-c-secondary">{{ $slider->slider_desc }}</span>

                                <span class="content-span-3 u-c-secondary">Tìm kiếm & mua sắm các thiết bị điện tử, giải trí chơi game tốt nhất tại đây <i class="far fa-hand-point-down"></i></span>

                                <span class="content-span-4 u-c-secondary">Giá chỉ từ

                                    <span class="u-c-brand">10,000 VNĐ</span></span>

                                <a class="shop-now-link btn--e-brand" href="{{ route('home.shop') }}">MUA NGAY</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

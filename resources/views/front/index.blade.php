{{-- این صفحه توسط متد index() در Front/IndexController.php رندر می‌شود --}} 
@extends('front.layout.layout')

@section('content')
    <!-- اسلایدر اصلی -->
    <div class="default-height ph-item">
        <div class="slider-main owl-carousel">

            {{-- نمایش بنرها به صورت داینامیک بر اساس تنظیمات پنل مدیریت --}} 
            @foreach ($sliderBanners as $banner)
                <div class="bg-image">
                    <div class="slide-content">
                        <h1>
                            <a @if (!empty($banner['link'])) href="{{ url($banner['link']) }}" @else href="javascript:;" @endif>
                                <img src="{{ asset('front/images/banner_images/' . $banner['image']) }}" title="{{ $banner['title'] }}" alt="{{ $banner['title'] }}">
                            </a>
                        </h1>
                        <h2>{{ $banner['title'] }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- اسلایدر اصلی /- -->

    @if (isset($fixBanners[1]['image']))
        <!-- لایه بنر -->
        <div class="banner-layer">
            <div class="container">
                <div class="image-banner">
                    <a target="_blank" rel="nofollow" href="{{ url($fixBanners[1]['link']) }}" class="mx-auto banner-hover effect-dark-opacity">
                        <img class="img-fluid" src="{{ asset('front/images/banner_images/' . $fixBanners[1]['image']) }}" alt="{{ $fixBanners[1]['alt'] }}" title="{{ $fixBanners[1]['title'] }}">
                    </a>
                </div>
            </div>
        </div>
        <!-- لایه بنر /- -->    
    @endif

    <!-- مجموعه برتر -->
    <section class="section-maker">
        <div class="container">
            <div class="sec-maker-header text-center">
                <h3 class="sec-maker-h3">مجموعه برتر</h3>
                <ul class="nav tab-nav-style-1-a justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#men-latest-products">جدیدترین‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#men-best-selling-products">پرفروش‌ترین‌ها</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#discounted-products">محصولات تخفیفی</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#men-featured-products">محصولات ویژه</a>
                    </li>
                </ul>
            </div>
            <div class="wrapper-content">
                <div class="outer-area-tab">
                    <div class="tab-content">
                        <div class="tab-pane active show fade" id="men-latest-products">
                            <div class="slider-fouc">
                                <div class="products-slider owl-carousel" data-item="4">

                                    {{-- نمایش جدیدترین‌ها. فقط ۸ محصول اخیر را نمایش بده --}} 
                                    @foreach ($newProducts as $product)
                                        @php
                                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                                        @endphp

                                        <div class="item">
                                            <div class="image-container">
                                                <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">
                                                    @if (!empty($product['product_image']) && file_exists($product_image_path))
                                                        <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="محصول">
                                                    @else
                                                        <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="محصول">
                                                    @endif
                                                </a>
                                                <div class="item-action-behaviors">
                                                    <a class="item-quick-look" data-toggle="modal" href="#quick-view">مشاهده سریع</a>
                                                    <a class="item-mail" href="javascript:void(0)">ارسال ایمیل</a>
                                                    <a class="item-addwishlist" href="javascript:void(0)">افزودن به لیست علاقه‌مندی‌ها</a>
                                                    <a class="item-addCart" href="{{ url('product/' . $product['id']) }}">افزودن به سبد خرید</a>
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <div class="what-product-is">
                                                    <ul class="bread-crumb">
                                                        <li>
                                                            <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_code'] }}</a>
                                                        </li>
                                                    </ul>
                                                    <h6 class="item-title">
                                                        <a href="{{ url('product/' . $product['id']) }}">{{ $product['product_name'] }}</a>
                                                    </h6>
                                                    <div class="item-stars">
                                                        <div class='star' title="0 از 5 بر اساس 0 نظر">
                                                            <span style='width:0'></span>
                                                        </div>
                                                        <span>(0)</span>
                                                    </div>
                                                </div>
                                                @php
                                                    $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                                                @endphp

                                                @if ($getDiscountPrice > 0)
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            تومان {{ $getDiscountPrice }}
                                                        </div>
                                                        <div class="item-old-price">
                                                            تومان {{ $product['product_price'] }}
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="price-template">
                                                        <div class="item-new-price">
                                                            تومان {{ $product['product_price'] }}
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="tag new">
                                                <span>جدید</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- بخش‌های دیگر محصولات مانند پرفروش‌ترین‌ها، تخفیفی‌ها و محصولات ویژه مشابه این ساختار هستند -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- مجموعه برتر /- -->

    

    <!-- اولویت‌های سایت -->
    <section class="app-priority">
        <div class="container">
            <div class="priority-wrapper u-s-p-b-80">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-star"></i>
                            </div>
                            <h2>
                                ارزش بالا
                            </h2>
                            <p>ما قیمت‌های رقابتی را در مجموعه محصولات متنوع ارائه می‌دهیم</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-cash"></i>
                            </div>
                            <h2>
                                خرید با اطمینان
                            </h2>
                            <p>محافظت ما خرید شما را از کلیک تا تحویل پوشش می‌دهد</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-ios-card"></i>
                            </div>
                            <h2>
                                پرداخت امن
                            </h2>
                            <p>با محبوب‌ترین و امن‌ترین روش‌های پرداخت خرید کنید</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="single-item-wrapper">
                            <div class="single-item-icon">
                                <i class="ion ion-md-contacts"></i>
                            </div>
                            <h2>
                                پشتیبانی 24/7
                            </h2>
                            <p>پشتیبانی 24 ساعته برای تجربه خرید روان</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- اولویت‌های سایت /- -->
@endsection

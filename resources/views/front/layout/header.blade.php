<?php
// دریافت بخش‌های فعال و دسته‌بندی‌های مربوط به آن‌ها
$sections = \App\Models\Section::sections();
?>

<!-- هدر -->
<header>
    <!-- هدر بالایی -->
    <div class="full-layer-outer-header">
        <div class="container clearfix">
            <nav>
                <ul class="primary-nav g-nav">
                    <li>
                        <a href="tel:+201255845857">
                        <i class="fas fa-phone u-c-brand u-s-m-r-9"></i>
                        تلفن: +201255845857</a>
                    </li>
                    <li>
                        <a href="mailto:info@multi-vendore-commerce.com">
                        <i class="fas fa-envelope u-c-brand u-s-m-r-9"></i>
                        ایمیل: info@multi-vendore-commerce.com
                        </a>
                    </li>
                </ul>
            </nav>
            <nav>
                <ul class="secondary-nav g-nav">
                    <li>
                        <a>
                            {{-- اگر کاربر وارد شده باشد، "حساب من" را نمایش بده، در غیر اینصورت "ورود/ثبت‌نام" --}}
                            @if (\Illuminate\Support\Facades\Auth::check())
                                حساب من
                            @else
                                ورود/ثبت‌نام
                            @endif
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:200px">
                            <li>
                                <a href="{{ url('cart') }}">
                                <i class="fas fa-cog u-s-m-r-9"></i>
                                سبد خرید من</a>
                            </li>
                            <li>
                                <a href="{{ url('checkout') }}">
                                <i class="far fa-check-circle u-s-m-r-9"></i>
                                ادامه خرید</a>
                            </li>
                            @if (\Illuminate\Support\Facades\Auth::check())
                                <li>
                                    <a href="{{ url('user/account') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        حساب من
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('user/orders') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        سفارش‌های من
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('user/logout') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        خروج
                                    </a>
                                </li>
                            @else
                                <li>
                                    <a href="{{ url('user/login-register') }}"> 
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        ورود مشتری
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('vendor/login-register') }}">
                                        <i class="fas fa-sign-in-alt u-s-m-r-9"></i>
                                        ورود فروشنده
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a>واحد پول
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:90px">
                            <li>
                                <a href="#" class="u-c-brand">LE EGP</a>
                            </li>
                            <li>
                                <a href="#">($) USD</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a>زبان
                        <i class="fas fa-chevron-down u-s-m-l-9"></i>
                        </a>
                        <ul class="g-dropdown" style="width:70px">
                            <li>
                                <a href="#" class="u-c-brand">ENG</a>
                            </li>
                            <li>
                                <a href="#">فارسی</a>
                            </li>
                        </ul>
                </ul>
            </nav>
        </div>
    </div>
    <!-- هدر بالایی /- -->
    <!-- هدر میانی -->
    <div class="full-layer-mid-header">
        <div class="container">
            <div class="row clearfix align-items-center">
                <div class="col-lg-3 col-md-9 col-sm-6">
                    <div class="brand-logo text-lg-center">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('front/images/main-logo/main-logo.png') }}" alt="فروشگاه چندفروشنده" class="app-brand-logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 u-d-none-lg">
                    {{-- فرم جستجوی وب‌سایت --}}
                    <form class="form-searchbox" action="{{ url('/search-products') }}" method="get">
                        <label class="sr-only" for="search-landscape">جستجو</label>
                        <input id="search-landscape" type="text" class="text-field" placeholder="همه چیز را جستجو کنید" name="search" @if (isset($_REQUEST['search']) && !empty($_REQUEST['search'])) value="{{ $_REQUEST['search'] }}" @endif>
                        <div class="select-box-position">
                            <div class="select-box-wrapper select-hide">
                                <label class="sr-only" for="select-category">انتخاب دسته‌بندی برای جستجو</label>
                                <select class="select-box" id="select-category" name="section_id">
                                    <option selected="selected" value="">همه</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section['id'] }}" @if (isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id']) && $_REQUEST['section_id'] == $section['id']) selected @endif>{{ $section['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button id="btn-search" type="submit" class="button button-primary fas fa-search"></button>
                    </form>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <nav>
                        <ul class="mid-nav g-nav">
                            <li class="u-d-none-lg">
                                <a href="{{ url('/') }}">
                                <i class="ion ion-md-home u-c-brand"></i>
                                </a>
                            </li>
                            <li>
                                <a id="mini-cart-trigger">
                                <i class="ion ion-md-basket"></i>
                                <span class="item-counter totalCartItems">{{ totalCartItems() }}</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- هدر میانی /- -->
    <!-- هدر پایینی -->
    <div class="full-layer-bottom-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="v-menu v-close">
                        <span class="v-title">
                        <i class="ion ion-md-menu"></i>
                        همه دسته‌بندی‌ها
                        <i class="fas fa-angle-down"></i>
                        </span>
                        <nav>
                            <div class="v-wrapper">
                                <ul class="v-list animated fadeIn">
                                    @foreach ($sections as $section)
                                        @if (count($section['categories']) > 0)
                                            <li class="js-backdrop">
                                                <a href="javascript:;">
                                                <i class="ion-ios-add-circle"></i>
                                                {{ $section['name'] }}
                                                <i class="ion ion-ios-arrow-forward"></i>
                                                </a>
                                                <button class="v-button ion ion-md-add"></button>
                                                <div class="v-drop-right" style="width: 700px;">
                                                    <div class="row">
                                                        @foreach ($section['categories'] as $category)
                                                            <div class="col-lg-4">
                                                                <ul class="v-level-2">
                                                                    <li>
                                                                        <a href="{{ url($category['url']) }}">{{ $category['category_name'] }}</a>
                                                                        <ul>
                                                                            @foreach ($category['sub_categories'] as $subcategory)
                                                                            <li>
                                                                                <a href="{{ url($subcategory['url']) }}">{{ $subcategory['category_name'] }}</a>
                                                                            </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-9">
                    <ul class="bottom-nav g-nav u-d-none-lg">
                        <li>
                            <a href="{{ url('search-products?search=new-arrivals') }}">جدیدترین محصولات 
                            <span class="superscript-label-new">جدید</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=best-sellers') }}">پرفروش‌ترین‌ها 
                            <span class="superscript-label-hot">داغ</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=featured') }}">ویژه
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('search-products?search=discounted') }}">تخفیف‌دار 
                            <span class="superscript-label-discount">>10%</span>
                            </a>
                        </li>
                        <li class="mega-position">
                            <a>بیشتر
                            <i class="fas fa-chevron-down u-s-m-l-9"></i>
                            </a>
                            <div class="mega-menu mega-3-colm">
                                <ul>
                                    <li class="menu-title">شرکت</li>
                                    <li>
                                        <a href="{{ url('about-us') }}" class="u-c-brand">درباره ما</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('contact') }}">تماس با ما</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('faq') }}">سؤالات متداول</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">مجموعه‌ها</li>
                                    <li>
                                        <a href="{{ url('men') }}">لباس مردانه</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('women') }}">لباس زنانه</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('kids') }}">لباس بچه‌گانه</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="menu-title">حساب کاربری</li>
                                    <li>
                                        <a href="{{ url('user/account') }}">حساب من</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('user/orders') }}">سفارش‌های من</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- هدر پایینی /- -->
</header>
<!-- هدر /- -->

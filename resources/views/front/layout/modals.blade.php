{{-- پنجره‌های پاپ‌آپ --}}

<!-- انتخاب‌گر آزمایشی -->
<div class="select-dummy-wrapper">
    <select id="compute-select">
        <option id="compute-option">همه</option>
    </select>
</div>
<!-- انتخاب‌گر آزمایشی /- -->

<!-- جستجوی واکنش‌گرا -->
<div class="responsive-search-wrapper">
    <button type="button" class="button ion ion-md-close" id="responsive-search-close-button"></button>
    <div class="responsive-search-container">
        <div class="container">
            <p>شروع به تایپ کنید و کلید Enter را فشار دهید</p>
            <form class="responsive-search-form">
                <label class="sr-only" for="search-text">جستجو</label>
                <input id="search-text" type="text" class="responsive-search-field" placeholder="لطفاً جستجو کنید">
                <i class="fas fa-search"></i>
            </form>
        </div>
    </div>
</div>
<!-- جستجوی واکنش‌گرا /- -->

<!-- پنجره پیش‌نمایش سریع -->
<div id="quick-view" class="modal fade">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="button dismiss-button ion ion-ios-close" data-dismiss="modal"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- بخش تصویر محصول -->
                        <div class="zoom-area">
                            <img id="zoom-pro-quick-view" class="img-fluid" src="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}" alt="تصویر بزرگنمایی">
                            <div id="gallery-quick-view" class="u-s-m-t-10">
                                <a class="active" data-image="{{ asset('front/images/product/product@4x.jpg') }}" data-zoom-image="{{ asset('front/images/product/product@4x.jpg') }}">
                                <img src="{{ asset('front/images/product/product@2x.jpg') }}" alt="محصول">
                                </a>
                                <!-- تکرار تصاویر دیگر -->
                            </div>
                        </div>
                        <!-- بخش تصویر محصول /- -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <!-- جزئیات محصول -->
                        <div class="all-information-wrapper">
                            <div class="section-1-title-breadcrumb-rating">
                                <div class="product-title">
                                    <h1>
                                        <a href="single-product.html">نام محصول</a>
                                    </h1>
                                </div>
                                <ul class="bread-crumb">
                                    <li class="has-separator">
                                        <a href="index.html">خانه</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="shop-v1-root-category.html">لباس مردانه</a>
                                    </li>
                                    <li class="has-separator">
                                        <a href="listing.html">تاپ‌ها</a>
                                    </li>
                                    <li class="is-marked">
                                        <a href="shop-v3-sub-sub-category.html">هودی</a>
                                    </li>
                                </ul>
                                <div class="product-rating">
                                    <div class='star' title="4.5 از 5 - بر اساس 23 نظر">
                                        <span style='width:67px'></span>
                                    </div>
                                    <span>(23)</span>
                                </div>
                            </div>
                            <div class="section-2-short-description u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">توضیحات:</h6>
                                <p>توضیحات محصول در اینجا نوشته می‌شود.</p>
                            </div>
                            <div class="section-3-price-original-discount u-s-p-y-14">
                                <div class="price">
                                    <h4>100,000 تومان</h4>
                                </div>
                                <div class="original-price">
                                    <span>قیمت اصلی:</span>
                                    <span>120,000 تومان</span>
                                </div>
                                <div class="discount-price">
                                    <span>تخفیف:</span>
                                    <span>15%</span>
                                </div>
                                <div class="total-save">
                                    <span>صرفه‌جویی:</span>
                                    <span>20,000 تومان</span>
                                </div>
                            </div>
                            <div class="section-4-sku-information u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">اطلاعات محصول:</h6>
                                <div class="availability">
                                    <span>وضعیت:</span>
                                    <span>موجود</span>
                                </div>
                                <div class="left">
                                    <span>فقط:</span>
                                    <span>50 عدد باقی‌مانده</span>
                                </div>
                            </div>
                            <div class="section-5-product-variants u-s-p-y-14">
                                <h6 class="information-heading u-s-m-b-8">تنوع محصول:</h6>
                                <div class="color u-s-m-b-11">
                                    <span>رنگ‌های موجود:</span>
                                    <div class="color-variant select-box-wrapper">
                                        <select class="select-box product-color">
                                            <option value="1">خاکستری</option>
                                            <option value="3">مشکی</option>
                                            <option value="5">سفید</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="sizes u-s-m-b-11">
                                    <span>سایزهای موجود:</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size">
                                            <option value="">مردانه 2XL</option>
                                            <option value="">زنانه کوچک</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                                <form action="#" class="post-form">
                                    <div class="quick-social-media-wrapper u-s-m-b-22">
                                        <span>اشتراک‌گذاری:</span>
                                        <ul class="social-media-list">
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="quantity-wrapper u-s-m-b-22">
                                        <span>تعداد:</span>
                                        <div class="quantity">
                                            <input type="text" class="quantity-text-field" value="1">
                                            <a class="plus-a" data-max="1000">&#43;</a>
                                            <a class="minus-a" data-min="1">&#45;</a>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="button button-outline-secondary" type="submit">افزودن به سبد</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- جزئیات محصول /- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- پنجره پیش‌نمایش سریع /- -->

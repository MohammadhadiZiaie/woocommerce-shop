{{-- نمایش همه محصولات فروشنده --}} {{-- این فایل در front/products/vendor_listing.blade.php 'include' شده است --}} 

<!-- ردیف کانتینر محصولات -->
<div class="row product-container grid-style">

    @foreach ($vendorProducts as $product)
        <div class="product-item col-lg-4 col-md-6 col-sm-6">
            <div class="item">
                <div class="image-container">
                    <a class="item-img-wrapper-link" href="{{ url('product/' . $product['id']) }}">

                        @php
                            $product_image_path = 'front/images/product_images/small/' . $product['product_image'];
                        @endphp

                        @if (!empty($product['product_image']) && file_exists($product_image_path)) {{-- اگر تصویر محصول هم در پایگاه داده و هم در فایل‌سیستم موجود باشد --}}
                            <img class="img-fluid" src="{{ asset($product_image_path) }}" alt="محصول">
                        @else {{-- نمایش تصویر پیش‌فرض --}}
                            <img class="img-fluid" src="{{ asset('front/images/product_images/small/no-image.png') }}" alt="محصول">
                        @endif

                    </a>
                    <div class="item-action-behaviors">
                        <a class="item-quick-look" data-toggle="modal" href="#quick-view">نمایش سریع</a>
                        <a class="item-mail" href="javascript:void(0)">ارسال ایمیل</a>
                        <a class="item-addwishlist" href="javascript:void(0)">افزودن به علاقه‌مندی‌ها</a>
                        <a class="item-addCart" href="javascript:void(0)">افزودن به سبد خرید</a>
                    </div>
                </div>
                <div class="item-content">
                    <div class="what-product-is">
                        <ul class="bread-crumb">
                            <li class="has-separator">
                                <a href="shop-v1-root-category.html">{{ $product['product_code'] }}</a>
                            </li>
                            <li class="has-separator">
                                <a href="listing.html">{{ $product['product_color'] }}</a>
                            </li>
                            <li>
                                <a href="listing.html">{{ $product['brand']['name'] }}</a>
                            </li>
                        </ul>
                        <h6 class="item-title">
                            <a href="single-product.html">{{ $product['product_name'] }}</a>
                        </h6>
                        <div class="item-description">
                            <p>{{ $product['description'] }}</p>
                        </div>
                    </div>

                    {{-- محاسبه قیمت با تخفیف در صورت وجود تخفیف --}}
                    @php
                        $getDiscountPrice = \App\Models\Product::getDiscountPrice($product['id']);
                    @endphp

                    @if ($getDiscountPrice > 0) {{-- اگر تخفیفی وجود دارد، قیمت قبل و بعد تخفیف را نشان دهید --}}
                        <div class="price-template">
                            <div class="item-new-price">
                                تومان {{ $getDiscountPrice }} 
                            </div>
                            <div class="item-old-price">
                                تومان {{ $product['product_price'] }}
                            </div>
                        </div>
                    @else {{-- اگر تخفیفی وجود ندارد، قیمت اصلی را نمایش دهید --}}
                        <div class="price-template">
                            <div class="item-new-price">
                                تومان {{ $product['product_price'] }}
                            </div>
                        </div>
                    @endif

                </div>

                @php
                    $isProductNew = \App\Models\Product::isProductNew($product['id'])
                @endphp
                @if ($isProductNew == 'Yes')
                    <div class="tag new">
                        <span>جدید</span>
                    </div>
                @endif
            </div>
        </div>
    @endforeach

</div>
<!-- ردیف کانتینر محصولات /- -->

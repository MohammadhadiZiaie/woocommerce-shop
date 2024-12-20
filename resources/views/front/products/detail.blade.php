{{-- توجه: این صفحه زمانی باز می‌شود که روی محصولی در صفحه اصلی کلیک شود --}} {{-- $productDetails, categoryDetails و $totalStock از متد detail() در Front/ProductsController.php ارسال می‌شوند --}}
@extends('front.layout.layout')

@section('content')
    {{-- رتبه‌بندی ستاره (برای محصول) (در تب "نظرات") --}}
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        .rate:not(:checked) > input {
            position:inherit;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;    
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;  
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
    </style>

    <!-- بسته معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>جزئیات</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="javascript:;">جزئیات</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- بسته معرفی صفحه /- -->
    <!-- صفحه محصول -->
    <div class="page-detail u-s-p-t-80">
        <div class="container">
            <!-- جزئیات محصول -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <!-- منطقه زوم محصول -->
                    <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                        <a href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" alt="" width="500" height="500" />
                        </a>
                    </div>

                    <div class="thumbnails" style="margin-top: 30px">
                        <a href="{{ asset('front/images/product_images/large/' . $productDetails['product_image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}">
                            <img src="{{ asset('front/images/product_images/small/' . $productDetails['product_image']) }}" width="120" height="120" alt="" />
                        </a>

                        @foreach ($productDetails['images'] as $image)
                            <a href="{{ asset('front/images/product_images/large/' . $image['image']) }}" data-standard="{{ asset('front/images/product_images/small/' . $image['image']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $image['image']) }}" width="120" height="120" alt="" />
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="all-information-wrapper">
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>خطا:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>موفقیت:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="section-1-title-breadcrumb-rating">
                            <div class="product-title">
                                <h1>
                                    <a href="javascript:;">{{ $productDetails['product_name'] }}</a>
                                </h1>
                            </div>

                            <ul class="bread-crumb">
                                <li class="has-separator">
                                    <a href="{{ url('/') }}">خانه</a>
                                </li>
                                <li class="has-separator">
                                    <a href="javascript:;">{{ $productDetails['section']['name'] }}</a>
                                </li>
                                @php echo $categoryDetails['breadcrumbs'] @endphp
                            </ul>

                            <div class="product-rating">
                                <div title="{{ $avgRating }} از 5 - براساس {{ count($ratings) }} نظر">
                                    @if ($avgStarRating > 0)
                                        @php
                                            $star = 1;
                                            while ($star < $avgStarRating):
                                        @endphp
                                                <span style="color: gold; font-size: 17px">&#9733;</span>
                                        @php
                                                $star++;
                                            endwhile;
                                        @endphp
                                        ({{ $avgRating }})
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="section-2-short-description u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">توضیحات:</h6>
                            <p>{{ $productDetails['description'] }}</p>
                        </div>

                        <div class="section-3-price-original-discount u-s-p-y-14">
                            @php $getDiscountPrice = \App\Models\Product::getDiscountPrice($productDetails['id']) @endphp
                            <span class="getAttributePrice">
                                @if ($getDiscountPrice > 0)
                                    <div class="price">
                                        <h4>EGP{{ $getDiscountPrice }}</h4>
                                    </div>
                                    <div class="original-price">
                                        <span>قیمت اصلی:</span>
                                        <span>EGP{{ $productDetails['product_price'] }}</span>
                                    </div>
                                @else
                                    <div class="price">
                                        <h4>EGP{{ $productDetails['product_price'] }}</h4>
                                    </div>
                                @endif
                            </span>
                        </div>

                        <div class="section-4-sku-information u-s-p-y-14">
                            <h6 class="information-heading u-s-m-b-8">اطلاعات SKU:</h6>
                            <div class="left">
                                <span>کد محصول:</span>
                                <span>{{ $productDetails['product_code'] }}</span>
                            </div>
                            <div class="left">
                                <span>رنگ محصول:</span>
                                <span>{{ $productDetails['product_color'] }}</span>
                            </div>
                            <div class="availability">
                                <span>وضعیت:</span>
                                @if ($totalStock > 0)
                                    <span>موجود در انبار</span>
                                @else
                                    <span style="color: red">ناموجود</span>
                                @endif
                            </div>
                        </div>

                        @if(isset($productDetails['vendor']))
                            <div>
                                فروشنده: <a href="/products/{{ $productDetails['vendor']['id'] }}">
                                            {{ $productDetails['vendor']['vendorbusinessdetails']['shop_name'] }}
                                        </a>
                            </div>
                        @endif

                        <form action="{{ url('cart/add') }}" method="Post" class="post-form">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $productDetails['id'] }}">
                            <div class="section-5-product-variants u-s-p-y-14">
                                <div class="sizes u-s-m-b-11" style="margin-top: 20px">
                                    <span>سایز موجود:</span>
                                    <div class="size-variant select-box-wrapper">
                                        <select class="select-box product-size" id="getPrice" product-id="{{ $productDetails['id'] }}" name="size" required>
                                            <option value="">انتخاب سایز</option>
                                            @foreach ($productDetails['attributes'] as $attribute)
                                                <option value="{{ $attribute['size'] }}">{{ $attribute['size'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="section-6-social-media-quantity-actions u-s-p-y-14">
                                <div class="quantity-wrapper u-s-m-b-22">
                                    <span>تعداد:</span>
                                    <div class="quantity">
                                        <input class="quantity-text-field" type="number" name="quantity" value="1">
                                    </div>
                                </div>
                                <div>
                                    <button class="button button-outline-secondary" type="submit">افزودن به سبد خرید</button>
                                    <button class="button button-outline-secondary far fa-heart u-s-m-l-6"></button>
                                    <button class="button button-outline-secondary far fa-envelope u-s-m-l-6"></button>
                                </div>
                            </div>
                        </form>

                        <br><br><b>تحویل</b>
                        <input type="text" id="pincode" placeholder="بررسی کد پستی" required>
                        <button type="button" id="checkPincode">بررسی</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

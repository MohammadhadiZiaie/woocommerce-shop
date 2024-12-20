{{-- صفحه نمایش همه محصولات فروشنده (هنگامی که روی نام یک فروشگاه در front/products/detail.blade.php کلیک می‌کنید) --}} {{-- این نما از متد vendorListing() در Front/ProductsController.php بازگردانده می‌شود --}} 
@extends('front.layout.layout')

@section('content')
    <!-- بخش معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>{{ $getVendorShop }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="listing.html">{{ $getVendorShop }}</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- بخش معرفی صفحه /- -->

    <!-- صفحه فروشگاه -->
    <div class="page-shop u-s-p-t-80">
        <div class="container">
            <!-- معرفی فروشگاه -->
            <div class="shop-intro">
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <a href="{{ url('/') }}">خانه</a>
                    </li>
                    <li>{{ $getVendorShop }}</li>
                </ul>
            </div>
            <!-- معرفی فروشگاه /- -->
            <div class="row">
                <!-- بخش راست فروشگاه -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- نوار صفحه -->
                    <div class="page-bar clearfix">
                        <!-- //پایان مرتب‌سازی ابزار -->
                    </div>
                    <!-- نوار صفحه /- -->

                    <!-- ردیف محصولات -->
                    {{-- فیلتر مرتب‌سازی با AJAX. بررسی کنید ajax_products_listing.blade.php --}}
                    <div class="">
                        @include('front.products.vendor_products_listing')
                    </div>
                    <!-- ردیف محصولات /- -->

                    {{-- صفحه‌بندی لاراول و نمایش آن با استفاده از صفحه‌بندی Bootstrap --}}
                    {{-- <div>{{ $vendorProducts->links() }}</div> --}}

                    {{-- حل مشکل صفحه‌بندی لاراول با فیلتر مرتب‌سازی --}}
                    @if (isset($_GET['sort'])) {{-- اگر از فیلتر مرتب‌سازی استفاده شده باشد --}}
                        <div>
                            {{ $vendorProducts->appends(['sort' => $_GET['sort']])->links() }}
                        </div>
                    @else
                        <div>
                            {{ $vendorProducts->links() }}
                        </div>
                    @endif

                    <div>&nbsp;</div>
                </div>
                <!-- بخش راست فروشگاه /- -->
            </div>
        </div>
    </div>
    <!-- صفحه فروشگاه /- -->
@endsection

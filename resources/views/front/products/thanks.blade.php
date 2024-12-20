{{-- این صفحه توسط متد thanks() در Front/ProductsController.php رندر شده است --}}
@extends('front.layout.layout')

@section('content')
    <!-- بخش معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>سبد خرید</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">تشکر</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- بخش معرفی صفحه /- -->
    <!-- صفحه سبد خرید -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>سفارش شما با موفقیت ثبت شد</h3>
                    <p>شماره سفارش شما {{ Session::get('order_id') }} و جمع کل سفارش {{ Session::get('grand_total') }} تومان می‌باشد.</p> {{-- شماره سفارش همان شناسه `id` در جدول `orders` دیتابیس است. این اطلاعات در متد checkout() در Front/ProductsController.php داخل Session ذخیره شده است --}} {{-- دریافت داده: https://laravel.com/docs/10.x/session#retrieving-data --}}
                </div>
            </div>
        </div>
    </div>
    <!-- صفحه سبد خرید /- -->
@endsection

{{-- فراموش کردن/حذف برخی اطلاعات از Session پس از ثبت سفارش --}}
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('order_id');     // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponCode');   // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponAmount'); // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
@endphp

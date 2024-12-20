{{-- این صفحه توسط متد success() در کنترلر Front/PaypalController.php رندر می‌شود --}}
@extends('front.layout.layout')

@section('content')
    <!-- معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>پرداخت</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">تشکر</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه پایان -->

    <!-- صفحه تأیید پرداخت -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>پرداخت شما تأیید شده است</h3>
                    <p>از پرداخت شما سپاسگزاریم. سفارش شما به زودی پردازش خواهد شد.</p>
                    <p>شماره سفارش شما {{ Session::get('order_id') }} و مبلغ پرداخت‌شده برابر با {{ Session::get('grand_total') }} تومان است.</p>
                    {{-- شماره سفارش همان `id` مربوط به جدول `orders` در دیتابیس است که در متد checkout() در کنترلر Front/ProductsController.php در سشن ذخیره شده است. --}}
                </div>
            </div>
        </div>
    </div>
    <!-- صفحه تأیید پرداخت پایان -->
@endsection

{{-- حذف برخی داده‌ها از سشن پس از تکمیل پرداخت PayPal --}}
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // حذف داده‌ها از سشن: https://laravel.com/docs/10.x/session#deleting-data
    Session::forget('order_id');     // حذف داده‌ها از سشن
    Session::forget('couponCode');   // حذف داده‌ها از سشن
    Session::forget('couponAmount'); // حذف داده‌ها از سشن
@endphp

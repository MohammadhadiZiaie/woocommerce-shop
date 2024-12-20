{{-- این صفحه توسط متد error() در کنترلر Front/PaypalController.php رندر می‌شود (در صورت شکست پرداخت با PayPal) --}}
@extends('front.layout.layout')

@section('content')
    <!-- معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>سبد خرید</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">پرداخت ناموفق!</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه پایان -->

    <!-- صفحه سبد خرید -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>پرداخت شما ناموفق بود!</h3>
                    <p>لطفاً بعد از مدتی دوباره تلاش کنید. در صورت نیاز با ما تماس بگیرید.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- صفحه سبد خرید پایان -->
@endsection

{{-- حذف برخی داده‌ها از سشن پس از شکست پرداخت PayPal --}}
@php
    use Illuminate\Support\Facades\Session;

    Session::forget('grand_total');  // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('order_id');     // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponCode');   // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
    Session::forget('couponAmount'); // حذف داده: https://laravel.com/docs/9.x/session#deleting-data
@endphp

{{-- این صفحه توسط متد paypal() در کنترلر Front/PaypalController.php رندر می‌شود --}}
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
                        <a href="#">پرداخت سفارش</a>
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
                    <h3>لطفاً پرداخت سفارش خود را انجام دهید</h3>
                    <form action="{{ route('payment') }}" method="post"> 
                        {{-- این یک Route نام‌گذاری‌شده است. بررسی در فایل web.php --}}
                        {{-- تولید URL برای Route‌های نام‌گذاری‌شده: https://laravel.com/docs/9.x/routing#generating-urls-to-named-routes --}}
                        
                        @csrf {{-- جلوگیری از حملات CSRF: https://laravel.com/docs/9.x/csrf#preventing-csrf-requests --}}
                        
                        <input type="hidden" name="amount" value="{{ round(Session::get('grand_total') / 80, 2) }}"> 
                        {{-- 'grand_total' در متد checkout() در کنترلر Front/ProductsController.php در سشن ذخیره شده است --}}
                        {{-- تعامل با سشن: بازیابی داده‌ها: https://laravel.com/docs/9.x/session#retrieving-data --}}
                        {{-- توجه: PayPal فقط ارزهای معتبر جهانی را می‌پذیرد، بنابراین مبلغ INR به USD تبدیل شده است. --}}
                        
                        <input type="image" src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/checkout-logo-large.png" alt="پرداخت با PayPal">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- صفحه سبد خرید پایان -->
@endsection

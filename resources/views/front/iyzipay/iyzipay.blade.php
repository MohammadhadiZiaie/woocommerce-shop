{{-- این صفحه توسط متد iyzipay() در Front/IyzipayController.php رندر می‌شود --}}

@extends('front.layout.layout')

@section('content')

    <style>
        .button {
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button1 {
            background-color: #4CAF50; /* سبز */
        }

        .button2 {
            background-color: #008CBA; /* آبی */
        }
    </style>

    <!-- معرفی صفحه -->
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
                        <a href="#">ادامه به پرداخت</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه /- -->
    <!-- صفحه سبد خرید -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <h3>لطفاً مبلغ <span style="color: red">INR {{ Session::get('grand_total') }}</span> را برای سفارش خود پرداخت کنید</h3>
                    <a href="{{ url('iyzipay/pay') }}">
                        <button class="button button2">پرداخت کنید</button> {{-- تعامل با Session: بازیابی داده‌ها: https://laravel.com/docs/9.x/session#retrieving-data --}}
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- صفحه سبد خرید /- -->
@endsection

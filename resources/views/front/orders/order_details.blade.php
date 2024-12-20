@extends('front.layout.layout')

@section('content')
    <!-- Wrapper معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>جزئیات سفارش #{{ $orderDetails['id'] }}</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="{{ url('user/orders') }}">سفارش‌ها</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Wrapper معرفی صفحه پایان -->

    <!-- جزئیات سفارش -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">

                <!-- اطلاعات سفارش -->
                <table class="table table-striped table-bordered">
                    <thead class="table-danger">
                        <tr>
                            <th colspan="2">اطلاعات سفارش</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>تاریخ سفارش</td>
                            <td>{{ date('Y-m-d h:i:s', strtotime($orderDetails['created_at'])) }}</td>
                        </tr>
                        <tr>
                            <td>وضعیت سفارش</td>
                            <td>{{ $orderDetails['order_status'] }}</td>
                        </tr>
                        <tr>
                            <td>مجموع سفارش</td>
                            <td>{{ number_format($orderDetails['grand_total']) }} تومان</td>
                        </tr>
                        <tr>
                            <td>هزینه ارسال</td>
                            <td>{{ number_format($orderDetails['shipping_charges']) }} تومان</td>
                        </tr>

                        @if ($orderDetails['coupon_code'] != '')
                            <tr>
                                <td>کد تخفیف</td>
                                <td>{{ $orderDetails['coupon_code'] }}</td>
                            </tr>
                            <tr>
                                <td>مبلغ تخفیف</td>
                                <td>{{ number_format($orderDetails['coupon_amount']) }} تومان</td>
                            </tr>
                        @endif

                        @if ($orderDetails['courier_name'] != '')
                            <tr>
                                <td>نام پیک</td>
                                <td>{{ $orderDetails['courier_name'] }}</td>
                            </tr>
                            <tr>
                                <td>کد رهگیری</td>
                                <td>{{ $orderDetails['tracking_number'] }}</td>
                            </tr>
                        @endif

                        <tr>
                            <td>روش پرداخت</td>
                            <td>{{ $orderDetails['payment_method'] }}</td>
                        </tr>
                    </tbody>
                </table>

                <!-- اطلاعات محصولات سفارش -->
                <table class="table table-striped table-bordered">
                    <thead class="table-danger">
                        <tr>
                            <th>تصویر</th>
                            <th>کد محصول</th>
                            <th>نام محصول</th>
                            <th>اندازه</th>
                            <th>رنگ</th>
                            <th>تعداد</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderDetails['orders_products'] as $product)
                            <tr>
                                <td>
                                    @php
                                        $getProductImage = \App\Models\Product::getProductImage($product['product_id']);
                                    @endphp
                                    <a target="_blank" href="{{ url('product/' . $product['product_id']) }}">
                                        <img style="width: 80px" src="{{ asset('front/images/product_images/small/' . $getProductImage) }}">
                                    </a>
                                </td>
                                <td>{{ $product['product_code'] }}</td>
                                <td>{{ $product['product_name'] }}</td>
                                <td>{{ $product['product_size'] }}</td>
                                <td>{{ $product['product_color'] }}</td>
                                <td>{{ $product['product_qty'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- اطلاعات آدرس ارسال -->
                <table class="table table-striped table-bordered">
                    <thead class="table-danger">
                        <tr>
                            <th colspan="2">آدرس ارسال</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>نام</td>
                            <td>{{ $orderDetails['name'] }}</td>
                        </tr>
                        <tr>
                            <td>آدرس</td>
                            <td>{{ $orderDetails['address'] }}</td>
                        </tr>
                        <tr>
                            <td>شهر</td>
                            <td>{{ $orderDetails['city'] }}</td>
                        </tr>
                        <tr>
                            <td>استان</td>
                            <td>{{ $orderDetails['state'] }}</td>
                        </tr>
                        <tr>
                            <td>کشور</td>
                            <td>{{ $orderDetails['country'] }}</td>
                        </tr>
                        <tr>
                            <td>کد پستی</td>
                            <td>{{ $orderDetails['pincode'] }}</td>
                        </tr>
                        <tr>
                            <td>شماره موبایل</td>
                            <td>{{ $orderDetails['mobile'] }}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <!-- جزئیات سفارش پایان -->
@endsection

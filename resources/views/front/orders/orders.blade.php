@extends('front.layout.layout')

@section('content')
    <!-- معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>سفارش‌های من</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">سفارش‌ها</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه پایان -->

    <!-- سفارش‌ها -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            <div class="row">
                <table class="table table-striped table-bordered">
                    <thead class="table-danger">
                        <tr>
                            <th>کد سفارش</th>
                            <th>محصولات سفارش</th>
                            <th>روش پرداخت</th>
                            <th>مجموع کل</th>
                            <th>تاریخ ثبت سفارش</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>
                                    <a href="{{ url('user/orders/' . $order['id']) }}">{{ $order['id'] }}</a>
                                </td>
                                <td>
                                    {{-- نمایش کد محصولات --}}
                                    @foreach ($order['orders_products'] as $product)
                                        {{ $product['product_code'] }}
                                        <br>
                                    @endforeach
                                </td>
                                <td>{{ $order['payment_method'] }}</td>
                                <td>{{ number_format($order['grand_total']) }} تومان</td>
                                <td>{{ date('Y-m-d h:i:s', strtotime($order['created_at'])) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- سفارش‌ها پایان -->
@endsection

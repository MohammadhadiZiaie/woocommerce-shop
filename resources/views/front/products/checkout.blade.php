{{-- صفحه تکمیل سفارش --}}
@extends('front.layout.layout')

@section('content')
    <!-- معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>تکمیل سفارش</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="checkout.html">تکمیل سفارش</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه /- -->
    <!-- صفحه تکمیل سفارش -->
    <div class="page-checkout u-s-p-t-80">
        <div class="container">

            {{-- نمایش پیام‌های خطا --}}
            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <!-- آدرس‌های ارسال -->
                        <div class="col-lg-6" id="deliveryAddresses">
                            {{-- بارگذاری آدرس‌های ارسال --}}
                            @include('front.products.delivery_addresses')
                        </div>
                        <!-- آدرس‌های ارسال /- -->

                        <!-- جزئیات سفارش -->
                        <div class="col-lg-6">
                            <form name="checkoutForm" id="checkoutForm" action="{{ url('/checkout') }}" method="post">
                                @csrf

                                @if (count($deliveryAddresses) > 0)
                                    <h4 class="section-h4">آدرس‌های ارسال</h4>
                                    @foreach ($deliveryAddresses as $address)
                                        <div class="control-group" style="float: right; margin-left: 5px">
                                            <input type="radio" id="address{{ $address['id'] }}" name="address_id" value="{{ $address['id'] }}" shipping_charges="{{ $address['shipping_charges'] }}" total_price="{{ $total_price }}" coupon_amount="{{ \Illuminate\Support\Facades\Session::get('couponAmount') }}" codpincodeCount="{{ $address['codpincodeCount'] }}" prepaidpincodeCount="{{ $address['prepaidpincodeCount'] }}">
                                        </div>
                                        <div>
                                            <label class="control-label" for="address{{ $address['id'] }}">
                                                {{ $address['name'] }}، {{ $address['address'] }}، {{ $address['city'] }}، {{ $address['state'] }}، {{ $address['country'] }} ({{ $address['mobile'] }})
                                            </label>
                                            <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="removeAddress" style="float: left; margin-right: 10px">حذف</a>
                                            <a href="javascript:;" data-addressid="{{ $address['id'] }}" class="editAddress" style="float: left">ویرایش</a>
                                        </div>
                                    @endforeach
                                    <br>
                                @endif

                                <h4 class="section-h4">سفارش شما</h4>
                                <div class="order-table">
                                    <table class="u-s-m-b-13">
                                        <thead>
                                            <tr>
                                                <th>محصول</th>
                                                <th>جمع</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total_price = 0 @endphp
                                            @foreach ($getCartItems as $item)
                                                @php
                                                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('product/' . $item['product_id']) }}">
                                                            <img width="50px" src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="محصول">
                                                            <h6 class="order-h6">{{ $item['product']['product_name'] }}<br>{{ $item['size'] }}/{{ $item['product']['product_color'] }}</h6>
                                                        </a>
                                                        <span class="order-span-quantity">تعداد: {{ $item['quantity'] }}</span>
                                                    </td>
                                                    <td>
                                                        <h6 class="order-h6">EGP{{ $getDiscountAttributePrice['final_price'] * $item['quantity'] }}</h6>
                                                    </td>
                                                </tr>
                                                @php $total_price += $getDiscountAttributePrice['final_price'] * $item['quantity'] @endphp
                                            @endforeach
                                            <tr>
                                                <td><h3 class="order-h3">جمع کل</h3></td>
                                                <td><h3 class="order-h3">EGP{{ $total_price }}</h3></td>
                                            </tr>
                                            <tr>
                                                <td><h6 class="order-h6">هزینه ارسال</h6></td>
                                                <td><h6 class="order-h6"><span class="shipping_charges">EGP0</span></h6></td>
                                            </tr>
                                            <tr>
                                                <td><h6 class="order-h6">تخفیف کوپن</h6></td>
                                                <td>
                                                    <h6 class="order-h6">
                                                        @if (\Illuminate\Support\Facades\Session::has('couponAmount'))
                                                            <span class="couponAmount">EGP{{ \Illuminate\Support\Facades\Session::get('couponAmount') }}</span>
                                                        @else
                                                            EGP0
                                                        @endif
                                                    </h6>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><h3 class="order-h3">جمع نهایی</h3></td>
                                                <td><h3 class="order-h3"><strong class="grand_total">EGP{{ $total_price - \Illuminate\Support\Facades\Session::get('couponAmount') }}</strong></h3></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" id="placeOrder" class="button button-outline-secondary">ثبت سفارش</button>
                                </div>
                            </form>
                        </div>
                        <!-- جزئیات سفارش /- -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- صفحه تکمیل سفارش /- -->
@endsection

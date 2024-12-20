{{-- این فایل در front/layout/header.php 'include' شده است. این ویجت مینی‌کارت از front/layout/header.blade.php جدا شده و به اینجا منتقل شده است --}}

<!-- مینی‌کارت -->
<div class="mini-cart-wrapper">
    <div class="mini-cart">
        <div class="mini-cart-header">
            سبد خرید شما
            <button type="button" class="button ion ion-md-close" id="mini-cart-close"></button>
        </div>
        <ul class="mini-cart-list">

            {{-- محاسبه مجموع قیمت محصولات در سبد خرید --}}
            @php $total_price = 0 @endphp

            @php
                $getCartItems = getCartItems(); // این تابع در فایل Helpers/Helper.php ثبت شده است
            @endphp

            @foreach ($getCartItems as $item)
                @php
                    $getDiscountAttributePrice = \App\Models\Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                @endphp
                <li class="clearfix">
                    <a href="{{ url('product/' . $item['product_id']) }}">
                    <img src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="محصول">
                    <span class="mini-item-name">{{ $item['product']['product_name'] }}</span>
                    <span class="mini-item-price">EGP{{ $getDiscountAttributePrice['final_price'] }}</span>
                    <span class="mini-item-quantity"> x {{ $item['quantity'] }} </span>
                    </a>
                </li>
                @php $total_price = $total_price + ($getDiscountAttributePrice['final_price'] * $item['quantity']) @endphp
            @endforeach

        </ul>
        <div class="mini-shop-total clearfix">
            <span class="mini-total-heading float-left">جمع کل:</span>
            <span class="mini-total-price float-right">EGP{{ $total_price }}</span>
        </div>
        <div class="mini-action-anchors">
            <a href="{{ url('cart') }}" class="cart-anchor">مشاهده سبد خرید</a>
            <a href="{{ url('checkout') }}" class="checkout-anchor">ادامه خرید</a>
        </div>
    </div>
</div>
<!-- مینی‌کارت /- -->

{{-- حل مشکل بسته نشدن ویجت مینی‌کارت پس از بروزرسانی یا حذف محصولات از طریق AJAX --}}
{{-- <script>
    $('#mini-cart-close').on('click', function () {
        $('.mini-cart-wrapper').removeClass('mini-cart-open');
    });
</script> --}}

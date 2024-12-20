<!-- لیست محصولات در سبد خرید -->
<div class="table-wrapper u-s-m-b-60">
    <table>
        <thead>
            <tr>
                <th>محصول</th>
                <th>قیمت</th>
                <th>تعداد</th>
                <th>مجموع جزئی</th>
                <th>عملیات</th>
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
                        <div class="cart-anchor-image">
                            <a href="{{ url('product/' . $item['product_id']) }}">
                                <img src="{{ asset('front/images/product_images/small/' . $item['product']['product_image']) }}" alt="{{ $item['product']['product_name'] }}">
                                <h6>
                                    {{ $item['product']['product_name'] }} ({{ $item['product']['product_code'] }}) - {{ $item['size'] }}
                                    <br>
                                    رنگ: {{ $item['product']['product_color'] }}
                                </h6>
                            </a>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            @if ($getDiscountAttributePrice['discount'] > 0)
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{ number_format($getDiscountAttributePrice['final_price']) }} تومان
                                    </div>
                                    <div class="item-old-price" style="margin-left: -40px">
                                        {{ number_format($getDiscountAttributePrice['product_price']) }} تومان
                                    </div>
                                </div>
                            @else
                                <div class="price-template">
                                    <div class="item-new-price">
                                        {{ number_format($getDiscountAttributePrice['final_price']) }} تومان
                                    </div>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="cart-quantity">
                            <div class="quantity">
                                <input type="text" class="quantity-text-field" value="{{ $item['quantity'] }}">
                                <a data-max="1000" class="plus-a updateCartItem" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['quantity'] }}">&#43;</a>
                                <a data-min="1" class="minus-a updateCartItem" data-cartid="{{ $item['id'] }}" data-qty="{{ $item['quantity'] }}">&#45;</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="cart-price">
                            {{ number_format($getDiscountAttributePrice['final_price'] * $item['quantity']) }} تومان
                        </div>
                    </td>
                    <td>
                        <div class="action-wrapper">
                            <button class="button button-outline-secondary fas fa-trash deleteCartItem" data-cartid="{{ $item['id'] }}"></button>
                        </div>
                    </td>
                </tr>

                @php $total_price += $getDiscountAttributePrice['final_price'] * $item['quantity'] @endphp
            @endforeach
        </tbody>
    </table>
</div>
<!-- لیست محصولات پایان -->

<!-- صورتحساب -->
<div class="calculation u-s-m-b-60">
    <div class="table-wrapper-2">
        <table>
            <thead>
                <tr>
                    <th colspan="2">مجموع سبد خرید</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">جمع کل</h3>
                    </td>
                    <td>
                        <span class="calc-text">{{ number_format($total_price) }} تومان</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">تخفیف کوپن</h3>
                    </td>
                    <td>
                        <span class="calc-text couponAmount">
                            @if (\Illuminate\Support\Facades\Session::has('couponAmount'))
                                {{ number_format(\Illuminate\Support\Facades\Session::get('couponAmount')) }} تومان
                            @else
                                0 تومان
                            @endif
                        </span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <h3 class="calc-h3 u-s-m-b-0">مجموع نهایی</h3>
                    </td>
                    <td>
                        <span class="calc-text grand_total">
                            {{ number_format($total_price - \Illuminate\Support\Facades\Session::get('couponAmount', 0)) }} تومان
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- صورتحساب پایان -->

{{-- صفحه سبد خرید --}}
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
                        <a href="index.html">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="cart.html">سبد خرید</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه /- -->
    <!-- صفحه سبد خرید -->
    <div class="page-cart u-s-p-t-80">
        <div class="container">
            {{-- نمایش پیام‌های موفقیت و خطا --}}
            @if (Session::has('success_message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>موفقیت:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (Session::has('error_message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- پایان نمایش پیام‌ها --}}

            <div class="row">
                <div class="col-lg-12">
                    <div id="appendCartItems">
                        {{-- بارگذاری آیتم‌های سبد خرید --}}
                        @include('front.products.cart_items')
                    </div>

                    <!-- کوپن -->
                    <div class="coupon-continue-checkout u-s-m-b-60">
                        <div class="coupon-area">
                            <h6>اگر کد تخفیف دارید، آن را وارد کنید.</h6>
                            <div class="coupon-field">
                                <form id="applyCoupon" method="post" action="javascript:void(0)" @if (\Illuminate\Support\Facades\Auth::check()) user=1 @endif>
                                    <label class="sr-only" for="coupon-code">اعمال کوپن</label>
                                    <input type="text" class="text-field" placeholder="کد تخفیف را وارد کنید" id="code" name="code">
                                    <button type="submit" class="button">اعمال کوپن</button>
                                </form>
                            </div>
                        </div>
                        <div class="button-area">
                            <a href="{{ url('/') }}" class="continue">ادامه خرید</a>
                            <a href="{{ url('/checkout') }}" class="checkout">ادامه به پرداخت</a>
                        </div>
                    </div>
                    <!-- کوپن /- -->
                </div>
            </div>
        </div>
    </div>
    <!-- صفحه سبد خرید /- -->
@endsection

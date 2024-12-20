{{-- قابلیت فراموشی رمز عبور کاربر --}} 
{{-- این صفحه از لینک <a> در front/users/login_register.blade.php دسترسی پیدا می‌کند --}}
@extends('front.layout.layout')

@section('content')
    <!-- مقدمه صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>حساب کاربری</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">حساب کاربری</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- مقدمه صفحه /- -->
    <!-- صفحه حساب کاربری -->
    <div class="page-account u-s-p-t-80">
        <div class="container">

            {{-- نمایش پیام‌های موفقیت --}}
            @if (Session::has('success_message')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>موفقیت:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- نمایش پیام‌های خطا --}}
            @if (Session::has('error_message')) 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">

                <!-- فرم فراموشی رمز عبور -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">فراموشی رمز عبور؟</h2>
                        <h6 class="account-h6 u-s-m-b-30">برای بازیابی رمز عبور، ایمیل خود را وارد کنید.</h6>
                        <form id="forgotForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="user-email">ایمیل<span class="astk">*</span></label>
                                <input type="email" name="email" id="users-email" class="text-field" placeholder="ایمیل">
                                <p id="forgot-email"></p>
                            </div>
                            <div class="m-b-45">
                                <button type="submit" class="button button-outline-secondary w-100">ارسال</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- فرم فراموشی رمز عبور /- -->

                <!-- فرم ثبت‌نام -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">ثبت‌نام</h2>
                        <h6 class="account-h6 u-s-m-b-30">برای دسترسی به سفارشات و تاریخچه خود ثبت‌نام کنید.</h6>
                        <form id="registerForm" action="javascript:;" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="username">نام<span class="astk">*</span></label>
                                <input type="text" id="user-name" class="text-field" placeholder="نام کاربری" name="name">
                                <p id="register-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="usermobile">موبایل<span class="astk">*</span></label>
                                <input type="text" id="user-mobile" class="text-field" placeholder="موبایل" name="mobile">
                                <p id="register-mobile"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="useremail">ایمیل<span class="astk">*</span></label>
                                <input type="email" id="user-email" class="text-field" placeholder="ایمیل" name="email">
                                <p id="register-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="userpassword">رمز عبور<span class="astk">*</span></label>
                                <input type="password" id="user-password" class="text-field" placeholder="رمز عبور" name="password">
                                <p id="register-password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">شرایط و قوانین را خوانده‌ام و می‌پذیرم.</label>
                                <p id="register-accept"></p>
                            </div>
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">ثبت‌نام</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- فرم ثبت‌نام /- -->
            </div>
        </div>
    </div>
    <!-- صفحه حساب کاربری /- -->
@endsection

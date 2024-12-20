{{-- این صفحه از تب ورود فروشنده در منوی کشویی در هدر (در front/layout/header.blade.php) دسترسی پیدا می‌کند --}} 
@extends('front.layout.layout')

@section('content')
    <!-- بخش معرفی صفحه -->
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
    <!-- بخش معرفی صفحه /- -->
    <!-- صفحه حساب کاربری -->
    <div class="page-account u-s-p-t-80">
        <div class="container">

            {{-- نمایش خطاها --}}
            @if (Session::has('success_message')) 
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>موفقیت:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error_message')) 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any()) 
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="row">
                <!-- ورود -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">ورود</h2>
                        <h6 class="account-h6 u-s-m-b-30">خوش آمدید! وارد حساب کاربری خود شوید.</h6>

                        <form action="{{ url('admin/login') }}" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="vendor-email">ایمیل
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" name="email" id="vendor-email" class="text-field" placeholder="ایمیل">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendor-password">رمز عبور
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" name="password" id="vendor-password" class="text-field" placeholder="رمز عبور">
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">ورود</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ورود /- -->
                <!-- ثبت نام -->
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20">ثبت نام</h2>
                        <h6 class="account-h6 u-s-m-b-30">ثبت‌نام در این سایت به شما امکان مشاهده وضعیت سفارش و تاریخچه سفارش‌هایتان را می‌دهد.</h6>

                        <form id="vendorForm" action="{{ url('/vendor/register') }}" method="post">
                            @csrf
                            <div class="u-s-m-b-30">
                                <label for="vendorname">نام
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendorname" class="text-field" placeholder="نام فروشنده" name="name">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendormobile">شماره موبایل
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="vendormobile" class="text-field" placeholder="شماره موبایل فروشنده" name="mobile">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendoremail">ایمیل
                                    <span class="astk">*</span>
                                </label>
                                <input type="email" id="vendoremail" class="text-field" placeholder="ایمیل فروشنده" name="email">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="vendorpassword">رمز عبور
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="vendorpassword" class="text-field" placeholder="رمز عبور فروشنده" name="password">
                            </div>

                            <div class="u-s-m-b-30">
                                <input type="checkbox" class="check-box" id="accept" name="accept">
                                <label class="label-text no-color" for="accept">من قوانین و شرایط را خوانده و قبول دارم.
                                    <a href="terms-and-conditions.html" class="u-c-brand">قوانین و شرایط</a>
                                </label>
                            </div>

                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">ثبت نام</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- ثبت نام /- -->
            </div>
        </div>
    </div>
    <!-- صفحه حساب کاربری /- -->
@endsection

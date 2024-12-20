{{-- این صفحه از طریق گزینه "حساب من" در منوی کشویی در هدر (در front/layout/header.blade.php) دسترسی دارد. تابع userAccount() در Front/UserController.php این صفحه را نمایش می‌دهد --}} 
@extends('front.layout.layout')


@section('content')
    <!-- معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>حساب من</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="account.html">حساب</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه /- -->
    <!-- صفحه حساب -->
    <div class="page-account u-s-p-t-80">
        <div class="container">


            {{-- نمایش پیام‌های اعتبارسنجی --}} 
            @if (Session::has('success_message')) <!-- پیام موفقیت -->
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>موفقیت:</strong> {{ Session::get('success_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (Session::has('error_message')) <!-- پیام خطا -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> {{ Session::get('error_message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if ($errors->any()) <!-- خطاهای اعتبارسنجی -->
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>خطا:</strong> @php echo implode('', $errors->all('<div>:message</div>')); @endphp
                    <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif


            <div class="row">
                <!-- بروزرسانی اطلاعات تماس -->
                <div class="col-lg-6">
                    <div class="login-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="font-size: 18px">بروزرسانی اطلاعات تماس</h2>

                        <p id="account-error"></p>
                        <p id="account-success"></p>

                        <form id="accountForm" action="javascript:;" method="post"> {{-- ارسال فرم با استفاده از AJAX --}}
                            @csrf

                            <div class="u-s-m-b-30">
                                <label for="user-email">ایمیل
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" value="{{ \Illuminate\Support\Facades\Auth::user()->email }}" style="background-color: #e9e9e9" readonly disabled>
                                <p id="account-email"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-name">نام
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-name" name="name" value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                                <p id="account-name"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-address">آدرس
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-address" name="address" value="{{ \Illuminate\Support\Facades\Auth::user()->address }}">
                                <p id="account-address"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-city">شهر
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-city" name="city" value="{{ \Illuminate\Support\Facades\Auth::user()->city }}">
                                <p id="account-city"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-state">استان
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-state" name="state" value="{{ \Illuminate\Support\Facades\Auth::user()->state }}">
                                <p id="account-state"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-country">کشور
                                    <span class="astk">*</span>
                                </label>
                                <select class="text-field" id="user-country" name="country" style="color: #495057">
                                    <option value="">انتخاب کشور</option>

                                    @foreach ($countries as $country)
                                        <option value="{{ $country['country_name'] }}"  @if ($country['country_name'] == \Illuminate\Support\Facades\Auth::user()->country) selected @endif>{{ $country['country_name'] }}</option>
                                    @endforeach

                                </select>
                                <p id="account-country"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-pincode">کد پستی
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-pincode" name="pincode" value="{{ \Illuminate\Support\Facades\Auth::user()->pincode }}">
                                <p id="account-pincode"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="user-mobile">موبایل
                                    <span class="astk">*</span>
                                </label>
                                <input class="text-field" type="text" id="user-mobile" name="mobile" value="{{ \Illuminate\Support\Facades\Auth::user()->mobile }}">
                                <p id="account-mobile"></p>
                            </div>
                            <div class="m-b-45">
                                <button class="button button-outline-secondary w-100">بروزرسانی</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- بروزرسانی اطلاعات تماس /- -->


                <!-- بروزرسانی رمز عبور --> 
                <div class="col-lg-6">
                    <div class="reg-wrapper">
                        <h2 class="account-h2 u-s-m-b-20" style="font-size: 18px">بروزرسانی رمز عبور</h2>

                        <p id="password-success"></p>
                        <p id="password-error"></p>

                        <form id="passwordForm" action="javascript:;" method="post">
                            @csrf

                            <div class="u-s-m-b-30">
                                <label for="current-password">رمز عبور فعلی
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="current-password" class="text-field" placeholder="رمز عبور فعلی" name="current_password">
                                <p id="password-current_password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="new-password">رمز عبور جدید
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="new-password" class="text-field" placeholder="رمز عبور جدید" name="new_password">
                                <p id="password-new_password"></p>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="confirm-password">تایید رمز عبور
                                    <span class="astk">*</span>
                                </label>
                                <input type="password" id="confirm-password" class="text-field" placeholder="تایید رمز عبور" name="confirm_password">
                                <p id="password-confirm_password"></p>
                            </div>
                            <div class="u-s-m-b-45">
                                <button class="button button-primary w-100">بروزرسانی</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- بروزرسانی رمز عبور /- -->


            </div>
        </div>
    </div>
    <!-- صفحه حساب /- -->
@endsection

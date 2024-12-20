@extends('front.layout.layout')

@section('content')
    <!-- معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>تماس با ما</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="{{ url('/') }}">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="#">تماس با ما</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- معرفی صفحه پایان -->

    <!-- صفحه تماس -->
    <div class="page-contact u-s-p-t-80">
        <div class="container">
            <div class="row">
                <!-- فرم تماس -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="touch-wrapper">
                        <h1 class="contact-h1">ارتباط با ما</h1>

                        <!-- پیام خطا -->
                        @if (Session::has('error_message'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>خطا:</strong> {{ Session::get('error_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <!-- پیام موفقیت -->
                        @if (Session::has('success_message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>موفقیت:</strong> {{ Session::get('success_message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="بستن">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <!-- فرم ارسال پیام -->
                        <form action="{{ url('contact') }}" method="post">
                            @csrf

                            <div class="group-inline u-s-m-b-30">
                                <div class="group-1 u-s-p-r-16">
                                    <label for="contact-name">نام شما
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="text" id="contact-name" class="text-field" placeholder="نام" name="name" value="{{ old('name') }}">
                                </div>
                                <div class="group-2">
                                    <label for="contact-email">ایمیل شما
                                        <span class="astk">*</span>
                                    </label>
                                    <input type="email" id="contact-email" class="text-field" placeholder="ایمیل" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-subject">موضوع
                                    <span class="astk">*</span>
                                </label>
                                <input type="text" id="contact-subject" class="text-field" placeholder="موضوع" name="subject" value="{{ old('subject') }}">
                            </div>
                            <div class="u-s-m-b-30">
                                <label for="contact-message">پیام:</label>
                                <span class="astk">*</span>
                                <textarea class="text-area" id="contact-message" name="message">{{ old('message') }}</textarea>
                            </div>
                            <div class="u-s-m-b-30">
                                <button type="submit" class="button button-outline-secondary">ارسال پیام</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- اطلاعات تماس -->
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="information-about-wrapper">
                        <h1 class="contact-h1">درباره ما</h1>
                        <p>
                            ما آماده پاسخگویی به سوالات و درخواست‌های شما هستیم. از طریق فرم روبه‌رو یا اطلاعات تماس زیر با ما در ارتباط باشید.
                        </p>
                    </div>
                    <div class="contact-us-wrapper">
                        <h1 class="contact-h1">اطلاعات تماس</h1>
                        <div class="contact-material u-s-m-b-16">
                            <h6>مکان</h6>
                            <span>خیابان صلاح سالم، شماره ۱۰</span>
                            <span>قاهره، مصر</span>
                        </div>
                        <div class="contact-material u-s-m-b-16">
                            <h6>ایمیل</h6>
                            <span>developers@computerscience.com</span>
                        </div>
                        <div class="contact-material u-s-m-b-16">
                            <h6>تلفن</h6>
                            <span>+201122237359</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- نقشه -->
        <div class="u-s-p-t-80">
            <div id="map"></div>
        </div>
    </div>
    <!-- صفحه تماس پایان -->
@endsection

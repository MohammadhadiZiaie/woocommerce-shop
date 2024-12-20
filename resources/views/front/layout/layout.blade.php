<!DOCTYPE html>
<html class="no-js" lang="fa-IR">
    <head>
        <meta charset="UTF-8">
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="description" content="">
        <meta name="author" content="">

        {{-- متا تگ‌های استاتیک و دینامیک برای سئو --}}
        @if (!empty($meta_description))
            <meta name="description" content="{{ $meta_description }}">
        @endif

        @if (!empty($meta_keywords))
            <meta name="keywords" content="{{ $meta_keywords }}">
        @endif

        <title>
            {{-- متا تگ‌های استاتیک و دینامیک برای سئو --}}
            @if (!empty($meta_title))
                {{ $meta_title }}
            @else
                قالب فروشگاه چندفروشنده - توسعه‌یافته توسط Multi-vendor E-commerce Application
            @endif
        </title>

        <!-- آیکون استاندارد -->
        <link href="favicon.ico" rel="shortcut icon">
        <!-- فونت گوگل -->
        <link href="https://fonts.googleapis.com/css?family=Vazir&display=swap" rel="stylesheet">
        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="{{ url('front/css/bootstrap.min.css') }}">
        <!-- Font Awesome 5 -->
        <link rel="stylesheet" href="{{ url('front/css/fontawesome.min.css') }}">
        <!-- Ion-Icons 4 -->
        <link rel="stylesheet" href="{{ url('front/css/ionicons.min.css') }}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="{{ url('front/css/animate.min.css') }}">
        <!-- Owl-Carousel -->
        <link rel="stylesheet" href="{{ url('front/css/owl.carousel.min.css') }}">
        <!-- Jquery-Ui-Range-Slider -->
        <link rel="stylesheet" href="{{ url('front/css/jquery-ui-range-slider.min.css') }}">
        <!-- Utility -->
        <link rel="stylesheet" href="{{ url('front/css/utility.css') }}">
        <!-- Main -->
        <link rel="stylesheet" href="{{ url('front/css/bundle.css') }}">
        <!-- راست‌چین -->
        <link rel="stylesheet" href="{{ url('front/css/rtl.css') }}">
        <!-- EasyZoom -->
        <link rel="stylesheet" href="{{ url('front/css/easyzoom.css') }}">
        <link rel="stylesheet" href="{{ url('front/css/custom.css') }}">
    </head>
    <body dir="rtl">

        {{-- لودر --}}
        <div class="loader">
            <img src="{{ asset('front/images/loaders/loader.gif') }}" alt="در حال بارگذاری..." />
         </div>

        <!-- اپ -->
        <div id="app">

            {{-- هدر --}}
            @include('front.layout.header')

            {{-- محتوای میانی --}}
            @yield('content')

            {{-- فوتر --}}
            @include('front.layout.footer')

            {{-- پنجره‌های پاپ‌آپ --}}
            @include('front.layout.modals')

        </div>
        <!-- اپ /- -->

        {{-- جاوا اسکریپت --}}
        <script src="{{ url('front/js/jquery.min.js') }}"></script>
        <script src="{{ url('front/js/bootstrap.min.js') }}"></script>
        <script src="{{ url('front/js/owl.carousel.min.js') }}"></script>
        <script src="{{ url('front/js/app.js') }}"></script>
        <script src="{{ url('front/js/custom.js') }}"></script>
        <script src="{{ url('front/js/easyzoom.js') }}"></script>
        @include('front.layout.scripts')

    </body>
</html>

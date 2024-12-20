<!-- فوتر -->
<footer class="footer">
    <div class="container">
        <!-- بخش بیرونی فوتر -->
        <div class="outer-footer-wrapper u-s-p-y-80">
            <h6>
                برای پیشنهادات ویژه و اطلاعات تخفیف
            </h6>
            <h1>
                اشتراک در خبرنامه ما
            </h1>
            <p>
                با عضویت در لیست ایمیل، از به‌روزرسانی‌های مربوط به تخفیف‌ها، محصولات جدید و کدهای تخفیف باخبر شوید.
            </p>

            <form class="newsletter-form">
                <label class="sr-only" for="subscriber_email">ایمیل خود را وارد کنید</label>
                <input type="text" placeholder="آدرس ایمیل شما" id="subscriber_email" name="subscriber_email" required> {{-- استفاده از id در jQuery در front/js/custom.js --}}
                <button type="button" class="button" onclick="addSubscriber()">ارسال</button> {{-- بررسی تابع addSubscriber() در front/js/custom.js --}}
            </form>
        </div>
        <!-- بخش بیرونی فوتر /- -->

        <!-- بخش میانی فوتر -->
        <div class="mid-footer-wrapper u-s-p-b-80">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>شرکت</h6>
                        <ul>
                            <li>
                                <a href="{{ url('about-us') }}">درباره ما</a>
                            </li>
                            <li>
                                <a href="{{ url('contact') }}">تماس با ما</a>
                            </li>
                            <li>
                                <a href="{{ url('faq') }}">سؤالات متداول</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>مجموعه‌ها</h6>
                        <ul>
                            <li>
                                <a href="{{ url('men') }}">لباس مردانه</a>
                            </li>
                            <li>
                                <a href="{{ url('women') }}">لباس زنانه</a>
                            </li>
                            <li>
                                <a href="{{ url('kids') }}">لباس بچه‌گانه</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>حساب کاربری</h6>
                        <ul>
                            <li>
                                <a href="{{ url('user/account') }}">حساب من</a>
                            </li>
                            <li>
                                <a href="{{ url('user/orders') }}">سفارش‌های من</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="footer-list">
                        <h6>تماس</h6>
                        <ul>
                            <li>
                                <i class="fas fa-location-arrow u-s-m-r-9"></i>
                                <span>فروشگاه چندفروشنده</span>
                            </li>
                            <li>
                                <a href="tel:+201255845857">
                                <i class="fas fa-phone u-s-m-r-9"></i>
                                <span>+01255845857</span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto:info@multi-vendore-commerce.com">
                                <i class="fas fa-envelope u-s-m-r-9"></i>
                                <span>
                                info@multi-vendore-commerce.com</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- بخش میانی فوتر /- -->

        <!-- بخش پایینی فوتر -->
        <div class="bottom-footer-wrapper">
            <div class="social-media-wrapper">
                <ul class="social-media-list">
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-google-plus-g"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fas fa-rss"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="#">
                        <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p class="copyright-text">Copyright &copy; 2022
                <a target="_blank" rel="nofollow" href="#">فروشگاه چندفروشنده</a> | کلیه حقوق محفوظ است
            </p>
        </div>
        <!-- بخش پایینی فوتر /- -->
    </div>
</footer>
<!-- فوتر /- -->

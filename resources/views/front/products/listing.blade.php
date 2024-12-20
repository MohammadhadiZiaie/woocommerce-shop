{{-- توجه: listing.blade.php صفحه‌ای است که توسط متد listing() در Front/ProductsController.php رندر شده و هنگام کلیک روی یک دسته‌بندی در صفحه اصلی FRONT باز می‌شود --}} 
@extends('front.layout.layout')

@section('content')
    <!-- بخش معرفی صفحه -->
    <div class="page-style-a">
        <div class="container">
            <div class="page-intro">
                <h2>فروشگاه</h2>
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <i class="ion ion-md-home"></i>
                        <a href="index.html">خانه</a>
                    </li>
                    <li class="is-marked">
                        <a href="listing.html">فروشگاه</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- بخش معرفی صفحه /- -->

    <!-- صفحه فروشگاه -->
    <div class="page-shop u-s-p-t-80">
        <div class="container">
            <!-- معرفی فروشگاه -->
            <div class="shop-intro">
                <ul class="bread-crumb">
                    <li class="has-separator">
                        <a href="{{ url('/') }}">خانه</a>
                    </li>

                    {{-- مسیریابی --}} 
                    @php echo $categoryDetails['breadcrumbs']; @endphp
                </ul>
            </div>
            <!-- معرفی فروشگاه /- -->
            <div class="row">

                {{-- شامل کردن فیلترهای محصولات --}} 
                @include('front.products.filters')

                <!-- بخش سمت راست فروشگاه -->
                <div class="col-lg-9 col-md-9 col-sm-12">
                    <!-- نوار صفحه -->
                    <div class="page-bar clearfix">

                        {{-- اگر فرم جستجو در front/layout/header.blade.php استفاده نشده باشد. توجه: فیلترها در صورت استفاده از فرم جستجو پنهان می‌شوند --}} 
                        @if (!isset($_REQUEST['search']))

                            <!-- مرتب‌سازی محصولات -->
                            <form name="sortProducts" id="sortProducts">
                                {{-- مرتب‌سازی با استفاده از AJAX. بررسی در ajax_products_listing.blade.php --}} 
                                <input type="hidden" name="url" id="url" value="{{ $url }}"> {{-- $url از متد listing() در Front/ProductsController.php ارسال شده است --}}

                                <div class="toolbar-sorter">
                                    <div class="select-box-wrapper">
                                        <label class="sr-only" for="sort-by">مرتب‌سازی بر اساس</label>
                                        <select name="sort" id="sort" class="select-box">
                                            <option value="" selected>انتخاب کنید</option>
                                            <option value="product_latest" @if(isset($_GET['sort']) && $_GET['sort'] == 'product_latest') selected @endif>مرتب‌سازی: جدیدترین</option>
                                            <option value="price_lowest"   @if(isset($_GET['sort']) && $_GET['sort'] == 'price_lowest')   selected @endif>مرتب‌سازی: ارزان‌ترین</option>
                                            <option value="price_highest"  @if(isset($_GET['sort']) && $_GET['sort'] == 'price_highest')  selected @endif>مرتب‌سازی: گران‌ترین</option>
                                            <option value="name_a_z"       @if(isset($_GET['sort']) && $_GET['sort'] == 'name_a_z')       selected @endif>مرتب‌سازی: نام (الف - ی)</option>
                                            <option value="name_z_a"       @if(isset($_GET['sort']) && $_GET['sort'] == 'name_z_a')       selected @endif>مرتب‌سازی: نام (ی - الف)</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                            <!-- مرتب‌سازی محصولات /- -->

                        @endif

                        <!-- نمایش تعداد محصولات -->
                        <div class="toolbar-sorter-2">
                            <div class="select-box-wrapper">
                                <label class="sr-only" for="show-records">نمایش تعداد رکوردها</label>
                                <select class="select-box" id="show-records">
                                    <option selected="selected" value="">تعداد نمایش: {{ count($categoryProducts) }}</option>
                                    <option value="">نمایش: همه</option>
                                </select>
                            </div>
                        </div>
                        <!-- نمایش تعداد محصولات /- -->
                    </div>
                    <!-- نوار صفحه /- -->

                    <!-- نمایش محصولات -->
                    <div class="filter_products">
                        @include('front.products.ajax_products_listing')
                    </div>
                    <!-- نمایش محصولات /- -->

                    {{-- صفحه‌بندی محصولات --}}
                    @if (!isset($_REQUEST['search']))
                        @if (isset($_GET['sort']))
                            <div>
                                {{ $categoryProducts->appends(['sort' => $_GET['sort']])->links() }}
                            </div>
                        @else
                            <div>
                                {{ $categoryProducts->links() }}
                            </div>
                        @endif
                    @endif

                    <div>&nbsp;</div>

                    {{-- نمایش توضیحات دسته‌بندی و زیر‌دسته‌بندی --}}
                    <div>{{ $categoryDetails['categoryDetails']['description'] }}</div>
                </div>
                <!-- بخش سمت راست فروشگاه /- -->
            </div>
        </div>
    </div>
    <!-- صفحه فروشگاه /- -->
@endsection

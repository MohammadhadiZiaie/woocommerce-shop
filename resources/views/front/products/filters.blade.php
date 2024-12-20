{{-- این بخش مربوط به فیلترها است که توسط 'listing.blade.php' شامل شده است --}} 
@php
    $productFilters = \App\Models\ProductsFilter::productFilters(); // دریافت همه‌ی فیلترهای فعال
@endphp

<!-- محتوای نوار کناری فروشگاه -->
<div class="col-lg-3 col-md-3 col-sm-12">
    <!-- دریافت دسته‌بندی‌ها از دسته‌بندی اصلی -->
    <div class="fetch-categories">
        <h3 class="title-name">مرور دسته‌بندی‌ها</h3>
        <!-- سطح 1 -->
        <h3 class="fetch-mark-category">
            <a href="listing.html">تی‌شرت‌ها
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">تی‌شرت‌های معمولی
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">تی‌شرت‌های رسمی
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>
        <!-- پایان سطح 1 -->
        <!-- سطح 2 -->
        <h3 class="fetch-mark-category">
            <a href="listing.html">پیراهن‌ها
                <span class="total-fetch-items">(5)</span>
            </a>
        </h3>
        <ul>
            <li>
                <a href="shop-v3-sub-sub-category.html">پیراهن‌های معمولی
                    <span class="total-fetch-items">(3)</span>
                </a>
            </li>
            <li>
                <a href="listing.html">پیراهن‌های رسمی
                    <span class="total-fetch-items">(2)</span>
                </a>
            </li>
        </ul>
        <!-- پایان سطح 2 -->
    </div>
    <!-- دریافت دسته‌بندی‌ها از دسته‌بندی اصلی /- -->

    @if (!isset($_REQUEST['search']))
        <!-- فیلترها -->
        <!-- فیلتر اندازه -->
        <div class="facet-filter-associates">
            <h3 class="title-name">اندازه</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getSizes as $key => $size)
                        <input type="checkbox" class="check-box size" id="size{{ $key }}" name="size[]" value="{{ $size }}">
                        <label class="label-text" for="size{{ $key }}">{{ $size }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- فیلتر اندازه /- -->

        <!-- فیلتر رنگ -->
        <div class="facet-filter-associates">
            <h3 class="title-name">رنگ</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getColors as $key => $color)
                        <input type="checkbox" class="check-box color" id="color{{ $key }}" name="color[]" value="{{ $color }}">
                        <label class="label-text" for="color{{ $key }}">{{ $color }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- فیلتر رنگ /- -->

        <!-- فیلتر برند -->
        <div class="facet-filter-associates">
            <h3 class="title-name">برند</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @foreach ($getBrands as $key => $brand)
                        <input type="checkbox" class="check-box brand" id="brand{{ $key }}" name="brand[]" value="{{ $brand['id'] }}">
                        <label class="label-text" for="brand{{ $key }}">{{ $brand['name'] }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- فیلتر برند /- -->

        <!-- فیلتر قیمت -->
        <div class="facet-filter-associates">
            <h3 class="title-name">قیمت</h3>
            <form class="facet-form" action="#" method="post">
                <div class="associate-wrapper">
                    @php
                        $prices = array('0-1000', '1000-2000', '2000-5000', '5000-10000', '10000-100000');
                    @endphp
                    @foreach ($prices as $key => $price)
                        <input type="checkbox" class="check-box price" id="price{{ $key }}" name="price[]" value="{{ $price }}">
                        <label class="label-text" for="price{{ $key }}">تومان {{ $price }}</label>
                    @endforeach
                </div>
            </form>
        </div>
        <!-- فیلتر قیمت /- -->
    @endif
</div>
<!-- محتوای نوار کناری فروشگاه /- -->

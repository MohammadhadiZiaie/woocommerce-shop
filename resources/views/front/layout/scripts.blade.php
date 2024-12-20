@php
    // نکته: بیشتر محتوای این فایل از `front/js/custom.js` منتقل شده است تا امکان نوشتن کد PHP در کد JavaScript فراهم شود.
    // این فایل در `front/layout/layout.blade.php` گنجانده شده است.
    // این فایل برای فیلترهای داینامیک محصولات (راه دوم) استفاده می‌شود.

    $productFilters = \App\Models\ProductsFilter::productFilters(); // دریافت همه فیلترهای فعال
@endphp

<script>
    $(document).ready(function() {
        // مدیریت فیلترهای مرتب‌سازی بدون AJAX
        // مدیریت فیلترهای مرتب‌سازی با استفاده از AJAX
        $('#sort').on('change', function() {
            var sort = $('#sort').val(); // دریافت مقدار مرتب‌سازی انتخاب‌شده
            var url = $('#url').val(); // دریافت URL صفحه فعلی

            // دریافت مقادیر فیلترهای داینامیک
            var size = get_filter('size');
            var color = get_filter('color');
            var price = get_filter('price');
            var brand = get_filter('brand');

            // ارسال مقادیر فیلترها و مرتب‌سازی به سرور
            @foreach ($productFilters as $filters)
                var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}');
            @endforeach

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                url: url,
                type: 'Post',
                data: {
                    @foreach ($productFilters as $filters)
                        {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }},
                    @endforeach
                    sort: sort, url: url, size: size, color: color, price: price, brand: brand
                },
                success: function(data) {
                    $('.filter_products').html(data); // بروزرسانی لیست محصولات
                },
                error: function() {
                    alert('خطا در ارسال داده‌ها');
                }
            });
        });

        // مدیریت فیلترهای داینامیک
        @foreach ($productFilters as $filter)
            $('.{{ $filter['filter_column'] }}').on('click', function() {
                var url = $('#url').val();
                var sort = $('#sort option:selected').val();
                var size = get_filter('size');
                var color = get_filter('color');
                var price = get_filter('price');
                var brand = get_filter('brand');

                @foreach ($productFilters as $filters)
                    var {{ $filters['filter_column'] }} = get_filter('{{ $filters['filter_column'] }}');
                @endforeach

                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: url,
                    method: 'Post',
                    data: {
                        @foreach ($productFilters as $filters)
                            {{ $filters['filter_column'] }}: {{ $filters['filter_column'] }},
                        @endforeach
                        url: url, sort: sort, size: size, color: color, price: price, brand: brand
                    },
                    success: function(data) {
                        $('.filter_products').html(data);
                    },
                    error: function() {
                        alert('خطا در بارگذاری داده‌ها');
                    }
                });
            });
        @endforeach
    });
</script>

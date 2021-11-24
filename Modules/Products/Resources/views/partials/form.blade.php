<!--begin: Form Actions -->
<div class="kt-form__actions kt-margin-b-20">
    <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
        data-ktwizard-type="action-prev">
        قبلی
    </button>
    <button type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
        data-ktwizard-type="action-submit">
        ثبت
    </button>
    <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
        data-ktwizard-type="action-next">
        بعدی
    </button>
</div>
<!--end: Form Actions -->

<!--begin: Form Wizard Step 1-->
<div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
    <div class="kt-form__section kt-form__section--first">
        <div class="kt-wizard-v2__form">
            <div class="row form-group">
                <div class="col-lg-4 d-flex align-items-center">
                    <label for="status-switcher">وضعیت</label>
                    <span class="text-danger">*</span>
                    <span class="kt-switch kt-switch--sm ml-2">
                        <label title="وضعیت">
                            <input type="checkbox" name="status"
                                {{ old('status') || $product->status ? 'checked' : '' }}>
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <label for="status-switcher">پرفروش</label>
                    <span class="text-danger">*</span>
                    <span class="kt-switch kt-switch--sm ml-2">
                        <label title="پرفروش">
                            <input type="checkbox" name="best_sellers"
                                {{ old('best_sellers') || $product->best_sellers ? 'checked' : '' }}>
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <label for="status-switcher">ویژه</label>
                    <span class="text-danger">*</span>
                    <span class="kt-switch kt-switch--sm ml-2">
                        <label title="ویژه">
                            <input type="checkbox" name="vip" {{ old('vip') || $product->vip ? 'checked' : '' }}>
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-lg-6">
                    <label for="title-input">عنوان</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title-input" name="title"
                        value="{{ old('title') ?? $product->title }}" required>
                </div>
                <div class="col-lg-6">
                    <label for="tags-selector">تگ ها</label>
                    <select name="tags[]" id="tags" multiple style="width: 100%">
                        @foreach ($tags as $tag)
                            <option value="{{ $tag->id }}"
                                {{ in_array(
                                    $tag->id,
                                    old('tags') ??
                                        $product->Tags()->pluck('tag_id')->toArray(),
                                )
                                    ? 'selected'
                                    : '' }}>
                                {{ $tag->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-4">
                    <label for="category-selector">دسته‌بندی</label>
                    <select name="category_id" id="category-selector" style="width: 100%">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') ?? $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4 d-none">
                    <label for="subcategory-selector">زیردسته</label>
                    <select name="subcategory_id" id="subcategory-selector" style="width: 100%">
                        <option disabled></option>
                    </select>
                </div>
                <div class="col-lg-4 d-none">
                    <label for="sub-subcategory-selector">زیردسته</label>
                    <select name="sub_subcategory_id" id="sub-subcategory-selector" style="width: 100%">
                        <option disabled></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="description-input">توضیحات</label>
                <span class="text-danger">*</span>
                <textarea class="form-control" name="description">{!! $product->description !!}</textarea>
            </div>
        </div>
    </div>
</div>
<!--end: Form Wizard Step 1-->

<!--begin: Form Wizard Step 2-->
<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
    <div class="kt-form__section kt-form__section--first">
        <div class="kt-wizard-v2__form">
            <div class="from-group row">
                <div class="col-lg-6">
                    <label for="picture-input">تصویر</label>
                    <input type="file" name="image">
                </div>
                <div class="col-lg-6">
                    <label for="picture-input">تصاویر</label>
                    <input type="file" name="images[]" multiple>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end: Form Wizard Step 2-->

<!--begin: Form Wizard Step 4-->
<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
    <div class="kt-form__section kt-form__section--first">
        <div class="kt-wizard-v2__form">
            <div class="from-group row">
                <div class="col-lg-6">
                    <label for="discount-input">درصد تخفیف</label>
                    <input type="number" class="form-control" name="discount"
                        value="{{ old('discount') ?? $product->discount }}">
                </div>
                <div class="col-lg-6">
                    <label for="count-input">تعداد</label>
                    <input type="number" class="form-control" name="discount_count"
                        value="{{ old('discount_count') ?? $product->discount_count }}">
                </div>
            </div>
        </div>
    </div>
</div>

<!--end: Form Wizard Step 6-->

<!--begin: Form Wizard Step 7-->
<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
    <div class="kt-form__section kt-form__section--first">
        <div class="kt-wizard-v2__review">
            <div class="form-group-last" id="kt_repeater_1">
                <div class="form-group-last mb-3">
                    <div class="col-lg-4">
                        <a href="javascript:" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                            <i class="la la-plus"></i> افزودن
                        </a>
                    </div>
                </div>
                <div data-repeater-list="informations" class="multi-images">
                    @forelse ($product->Informations ? $product->Informations->information : [] as $information)
                        <div data-repeater-item class="align-items-center">
                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="info-title-input">عنوان</label>
                                        <input type="text" class="form-control" id="info-title-input"
                                            name="info[title]" value="{{ $information->title }}">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="info-value-input">مقدار</label>
                                        <input type="text" class="form-control" id="info-value-input"
                                            name="info[value]" value="{{ $information->value }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:" data-repeater-delete=""
                                        class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                        حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div data-repeater-item class="align-items-center">
                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label for="info-title-input">عنوان</label>
                                        <input type="text" class="form-control" id="info-title-input"
                                            name="info[title]">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="info-value-input">مقدار</label>
                                        <input type="text" class="form-control" id="info-value-input"
                                            name="info[value]">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:" data-repeater-delete=""
                                        class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                        حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!--end: Form Wizard Step 7-->

<!--begin: Form Wizard Step 7-->
<div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
    <div class="kt-form__section kt-form__section--first">
        <div class="kt-wizard-v2__review">
            <div class="form-group-last" id="kt_repeater_2">
                <div class="form-group-last mb-3">
                    <div class="col-lg-4">
                        <a href="javascript:" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand">
                            <i class="la la-plus"></i> افزودن
                        </a>
                    </div>
                </div>
                @forelse ($product->Prices as $price)
                    <div data-repeater-list="prices" class="multi-images">
                        <div data-repeater-item class="align-items-center">
                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="price-color-selector">رنگ</label>
                                        <select name="price[color]" style="width: 100%">
                                            @foreach (\Modules\Products\Entities\Product::COLORS as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $price->color_code == $key ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="price-count-input">تعداد</label>
                                        <input type="number" class="form-control" id="price-count-input"
                                            name="price[count]" value="{{ $price->count }}">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="price-price-input">مبلغ</label>
                                        <input type="text" class="form-control" id="price-price-input"
                                            name="price[price]" value="{{ $price->price }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:" data-repeater-delete=""
                                        class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                        حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div data-repeater-list="prices" class="multi-images">
                        <div data-repeater-item class="align-items-center">
                            <div class="col-lg-12 col-md-4 col-sm-12">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label for="price-color-selector">رنگ</label>
                                        <select name="price[color]" style="width: 100%">
                                            @foreach (\Modules\Products\Entities\Product::COLORS as $key => $value)
                                                <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="price-count-input">تعداد</label>
                                        <input type="number" class="form-control" id="price-count-input"
                                            name="price[count]">
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="price-price-input">مبلغ</label>
                                        <input type="text" class="form-control" id="price-price-input"
                                            name="price[price]">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <a href="javascript:" data-repeater-delete=""
                                        class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                        حذف
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<!--end: Form Wizard Step 7-->

@push('styles')
    <link rel="stylesheet" href="{{ asset('js/dashboard/bootstrap-datepicker-fa/dist/css/persian-datepicker.css') }}">
@endpush

@push('scripts')

    {{-- Select2 scripts --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#tags').select2({
                tags: true
            });

            $('#category-selector').select2({});
            $('#subcategory-selector').select2({});
            $('#sub-subcategory-selector').select2({});
        });
    </script>

    {{-- DateTimePicker scripts --}}
    <script src="{{ asset('js/dashboard/bootstrap-datepicker-fa/dist/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/bootstrap-datepicker-fa/dist/js/persian-datepicker.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#discount_start_time').persianDatepicker({
                initialValue: true,
                initialValueType: 'gregorian',
                altField: '#normalAlt1',
                altFormat: 'LLLL',
                observer: true,
                format: 'YYYY/MM/DD',
                timePicker: {
                    enabled: false
                }
            });
            $('#discount_end_time').persianDatepicker({
                initialValue: true,
                initialValueType: 'gregorian',
                altField: '#normalAlt2',
                altFormat: 'LLLL',
                observer: true,
                format: 'YYYY/MM/DD',
                timePicker: {
                    enabled: false
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $.ajax({
                url: '{{ route('admin.products.ajax.get-subcategories') }}',
                type: "POST",
                data: {
                    id: $('#category-selector').val(),
                    productId: "{{ $product ? $product->id : null }}",
                    '_token': '{{ csrf_token() }}'
                },
                success: function(data) {
                    $('#subcategory-selector').html(data);
                    $('#subcategory-selector').parents('.d-none').removeClass('d-none');

                    $.ajax({
                        url: '{{ route('admin.products.ajax.get-sub-subcategories') }}',
                        type: "POST",
                        data: {
                            id: $('#subcategory-selector').val(),
                            productId: "{{ $product ? $product->id : null }}",
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function(data) {
                            $('#sub-subcategory-selector').html(data);
                            $('#sub-subcategory-selector').parents('.d-none').removeClass(
                                'd-none');
                        }
                    });
                }
            });

            $('#category-selector').on('change', function() {
                $.ajax({
                    url: '{{ route('admin.products.ajax.get-subcategories') }}',
                    type: "POST",
                    data: {
                        id: $('#category-selector').val(),
                        productId: "{{ $product ? $product->id : null }}",
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#subcategory-selector').html(data);
                        $('#subcategory-selector').parents('.d-none').removeClass('d-none');

                        $.ajax({
                            url: '{{ route('admin.products.ajax.get-sub-subcategories') }}',
                            type: "POST",
                            data: {
                                id: $('#subcategory-selector').val(),
                                productId: "{{ $product ? $product->id : null }}",
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(data) {
                                $('#sub-subcategory-selector').html(data);
                                $('#sub-subcategory-selector').parents('.d-none')
                                    .removeClass('d-none');
                            }
                        });
                    }
                });
            });

            $('#subcategory-selector').on('change', function() {
                $.ajax({
                    url: '{{ route('admin.products.ajax.get-sub-subcategories') }}',
                    type: "POST",
                    data: {
                        id: $('#subcategory-selector').val(),
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(data) {
                        $('#sub-subcategory-selector').html(data);
                        $('#sub-subcategory-selector').parents('.d-none')
                            .removeClass('d-none');
                    }
                });
            });
        });
    </script>
@endpush

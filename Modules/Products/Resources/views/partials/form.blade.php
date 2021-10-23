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
                            <input type="checkbox" name="status">
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <label for="status-switcher">پرفروش</label>
                    <span class="text-danger">*</span>
                    <span class="kt-switch kt-switch--sm ml-2">
                        <label title="پرفروش">
                            <input type="checkbox" name="best_sellers">
                            <span></span>
                        </label>
                    </span>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <label for="status-switcher">ویژه</label>
                    <span class="text-danger">*</span>
                    <span class="kt-switch kt-switch--sm ml-2">
                        <label title="ویژه">
                            <input type="checkbox" name="vip">
                            <span></span>
                        </label>
                    </span>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-lg-6">
                    <label for="title-input">عنوان</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="title-input" name="title" required>
                </div>
                <div class="col-lg-6">
                    <label for="tags-selector">تگ ها</label>
                    <select name="tags[]" id="tags"></select>
                </div>
            </div>

            <div class="form-group">
                <label for="description-input">توضیحات</label>
                <span class="text-danger">*</span>
                <textarea class="form-control" name="description"></textarea>
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
                    <input type="file" name="image" required>
                </div>
                <div class="col-lg-6">
                    <label for="picture-input">تصاویر</label>
                    <input type="file" name="images[]">
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
                    <input type="number" class="form-control" name="discount">
                </div>
                <div class="col-lg-6">
                    <label for="count-input">تعداد</label>
                    <input type="number" class="form-control" name="count_discount">
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
                    <div data-repeater-item class="align-items-center">
                        <div class="col-lg-12 col-md-4 col-sm-12">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="info-title-input">عنوان</label>
                                    <input type="text" class="form-control" id="info-title-input" name="info[title]">
                                </div>
                                <div class="col-lg-6">
                                    <label for="info-value-input">مقدار</label>
                                    <input type="text" class="form-control" id="info-value-input" name="info[value]">
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
            </div>
        </div>
    </div>
</div>

<!--end: Form Wizard Step 7-->

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
                <div data-repeater-list="prices" class="multi-images">
                    <div data-repeater-item class="align-items-center">
                        <div class="col-lg-12 col-md-4 col-sm-12">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="price-color-selector">رنگ</label>
                                    <select name="price[color]" id="price-color-selector">
                                        
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label for="price-price-input">مبلغ</label>
                                    <input type="text" class="form-control" id="price-price-input" name="price[price]">
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
            $('.cancel-type').select2({});
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
            let params = {
                rules: {
                    title: {
                        required: true,
                    },
                    description: {
                        required: true
                    },
                    image: {
                        required: true
                    }
                },
                messages: {
                    title: {
                        required: 'عنوان اجباری می‌باشد!'
                    },

                    description: {
                        required: 'توضیحات اجباری می‌باشد!'
                    },

                    image: {
                        required: 'تصویر محصول اجباریست!'
                    }
                }
            };
            KTWizard2(params).init();
        })
    </script>
@endpush

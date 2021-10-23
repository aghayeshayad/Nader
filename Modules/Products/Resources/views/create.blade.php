@extends('layouts.Dashboard.master')

@section('title', 'افزودن محصول')

@section('error', true);

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                افزودن محصول
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-portlet__body kt-portlet__body--fit">
                            <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2"
                                data-ktwizard-state="step-first">
                                <div class="kt-grid__item kt-wizard-v2__aside">

                                    <!--begin: Form Wizard Nav -->
                                    <div class="kt-wizard-v2__nav">
                                        <div class="kt-wizard-v2__nav-items">

                                            <!--doc: Replace A tag with SPAN tag to disable the step link click -->
                                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step"
                                                data-ktwizard-state="current">
                                                <div class="kt-wizard-v2__nav-body">
                                                    <div class="kt-wizard-v2__nav-icon">
                                                        <i class="fa fa-info"></i>
                                                    </div>
                                                    <div class="kt-wizard-v2__nav-label">
                                                        <div class="kt-wizard-v2__nav-label-title">
                                                            اطلاعات محصول
                                                        </div>
                                                        <div class="kt-wizard-v2__nav-label-desc">
                                                            اطلاعات پایه ای محصول
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                                <div class="kt-wizard-v2__nav-body">
                                                    <div class="kt-wizard-v2__nav-icon">
                                                        <i class="flaticon2-photograph"></i>
                                                    </div>
                                                    <div class="kt-wizard-v2__nav-label">
                                                        <div class="kt-wizard-v2__nav-label-title">
                                                            فایل ها
                                                        </div>
                                                        <div class="kt-wizard-v2__nav-label-desc">
                                                            بارگذاری تصاویر محصول
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                                <div class="kt-wizard-v2__nav-body">
                                                    <div class="kt-wizard-v2__nav-icon">
                                                        <i class="fa fa-percent"></i>
                                                    </div>
                                                    <div class="kt-wizard-v2__nav-label">
                                                        <div class="kt-wizard-v2__nav-label-title">
                                                            تخفیفات
                                                        </div>
                                                        <div class="kt-wizard-v2__nav-label-desc">
                                                            ثبت تخفیف برای محصول
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                                <div class="kt-wizard-v2__nav-body">
                                                    <div class="kt-wizard-v2__nav-icon">
                                                        <i class="flaticon-interface-1"></i>
                                                    </div>
                                                    <div class="kt-wizard-v2__nav-label">
                                                        <div class="kt-wizard-v2__nav-label-title">
                                                            مشخصات
                                                        </div>
                                                        <div class="kt-wizard-v2__nav-label-desc">
                                                            مشخصات ظاهری
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                                <div class="kt-wizard-v2__nav-body">
                                                    <div class="kt-wizard-v2__nav-icon">
                                                        <i class="fa fa-money-bill-wave"></i>
                                                    </div>
                                                    <div class="kt-wizard-v2__nav-label">
                                                        <div class="kt-wizard-v2__nav-label-title">
                                                            قیمت
                                                        </div>
                                                        <div class="kt-wizard-v2__nav-label-desc">
                                                            قیمت گذاری محصول
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Wizard Nav -->
                                </div>
                                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">

                                    <!--begin: Form Wizard Form-->
                                    <form action="{{ route('admin.products.store') }}" method="post" class="kt-form"
                                        id="kt_form" enctype="multipart/form-data">
                                        @csrf
                                        @include('products::partials.form')
                                    </form>

                                    <!--end: Form Wizard Form-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard/wizard-2.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/dashboard/wizard-2.js') }}"></script>
@endpush

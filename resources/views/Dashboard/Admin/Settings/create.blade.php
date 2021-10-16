@extends('layouts.Dashboard.master')

@section('breadCrumb', Breadcrumbs::render('settings'))

@section('content')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            تنظیمات صفحه اصلی
                        </h3>
                    </div>
                </div>
                <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="kt-portlet__body">
                        <div class="kt-portlet kt-portlet--tabs">
                            <div class="kt-portlet__head">
                                <div class="kt-portlet__head-toolbar">
                                    <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line nav-tabs-line-right nav-tabs-line-brand" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_2_1" role="tab">
                                                <i class="la la-file"></i>
                                                درباره ما
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_2_2" role="tab">
                                                <i class="la la-phone-square"></i>
                                                اطلاعات تماس
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_2_3" role="tab">
                                                <i class="la la-instagram"></i>
                                                شبکه های اجتماعی
                                            </a>
                                        </li>


                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_2_4" role="tab">
                                                <i class="fa fa-link"></i>
                                                لینک سریع
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="kt-portlet__body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="kt_portlet_tab_2_1">
                                        <div class="form-group row">
                                            <div class="col-lg-12 ">
                                                <label>متن درباره ما:</label>
                                                <label>
                                                    <textarea name="aboutUs[description]" rows="4" class="form-control" placeholder="درباره ما...">{!! old('aboutUs[description]') ? old('aboutUs[description]') : $aboutUS?->data['description'] !!}</textarea>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12">
                                                <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
                                                    <label>عکس درباره ما:</label>
                                                    <div class="kt-avatar__holder" style="background-image: url('{{ $aboutUS?->image }}')"></div>
                                                    <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="ویرایش تصویر">
                                                        <i class="fa fa-pen"></i>
                                                        <input type="file" name="aboutUs[image]" accept=".png,.jpg,.jpeg" value="{{ $aboutUS?->image }}">
                                                    </label>
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="حذف تصویر">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="kt_portlet_tab_2_2">
                                        <div class="form-group row">
                                            <div class="col-lg-4">
                                                <label for="phone-input">تلفن تماس</label>
                                                <input type="text" name="contactUs[phone]" class="form-control" value="{{ old('contactUs[phone]') ? old('contactUs[phone]') : $contactUs?->data['phone'] }}" id="phone-input" placeholder="لطفا شماره تماس را وارد نمایید.">
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="phone1-input">فکس</label>
                                                <input type="text" name="contactUs[phone1]" class="form-control" value="{{ old('contactUs[phone1]') ? old('contactUs[phone1]') : $contactUs?->data['phone1'] }}" id="phone1-input" placeholder="لطفا شماره تماس را وارد نمایید.">
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="email-input">آدرس ایمیل</label>
                                                <input type="email" name="contactUs[email]" class="form-control" value="{{ old('contactUs[email]') ? old('contactUs[email]') : $contactUs?->data['email'] }}" id="email-input" placeholder="ایمیل را وارد نمایید.">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="address-input">آدرس اول</label>
                                            <textarea id="address-input" name="contactUs[address]" rows="2" class="form-control" placeholder="آدرس را وارد نمایید...">{!! old('contactUs[address]') ? old('contactUs[address]') : $contactUs?->data['address'] !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="kt_portlet_tab_2_3">
                                        <div id="kt_repeater_1">
                                            <div class="form-group-last row mb-3">
                                                <div class="col-lg-4">
                                                    <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand add-btn">
                                                        <i class="la la-plus"></i>
                                                        افزودن
                                                    </a>
                                                </div>
                                            </div>
                                            <div data-repeater-list="socials" class="multi-images">
                                                @if($socials?->data)
                                                @foreach($socials->data as $social)
                                                <div data-repeater-item class="align-items-center">
                                                    <div class="row">
                                                        <div class="col-lg-6 selector">
                                                            <label for="type-input">نوع</label>
                                                            <select class="form-control kt-select2" name="type" style="width: 100%">
                                                                @foreach(\App\Models\Setting::SOCIALS as $item)
                                                                <option value="{{ $item['type'] }}" {{ ($item['type'] == $social['type']) ? 'selected' : '' }}>{{ $item['title'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="link-input">لینک</label>
                                                            <input type="text" class="form-control" id="link-input" name="link" value="{{ old('link') ? old('link') : $social['link'] }}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                                            حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div data-repeater-item class="align-items-center">
                                                    <div class="row">
                                                        <div class="col-lg-6 selector">
                                                            <label for="type-input">نوع</label>
                                                            <select class="form-control kt-select2" name="type" style="width: 100%">
                                                                @foreach(\App\Models\Setting::SOCIALS as $item)
                                                                <option value="{{ $item['type'] }}" {{ (old('type') == $item['title']) ? 'selected' : '' }}>{{ $item['title'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="link-input">لینک</label>
                                                            <input type="text" class="form-control" id="link-input" name="link" value="{{ old('link') }}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                                            حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane " id="kt_portlet_tab_2_4">
                                        <div id="kt_repeater_3">
                                            <div class="form-group-last row mb-3">
                                                <div class="col-lg-4">
                                                    <a href="javascript:;" data-repeater-create="" class="btn btn-bold btn-sm btn-label-brand add-btn">
                                                        <i class="la la-plus"></i>
                                                        افزودن
                                                    </a>
                                                </div>
                                            </div>
                                            <div data-repeater-list="fast_links" class="multi-images">
                                                @if($fast_links?->data)
                                                @foreach($fast_links->data as $link)
                                                <div data-repeater-item class="align-items-center">
                                                    <div class="row">
                                                        <div class="col-lg-6 ">
                                                            <label for="type-input">عنوان</label>
                                                            <input type="text" class="form-control" id="type-input" name="type" value="{{ old('type') ? old('type') : $link['type'] }}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="link-input">لینک</label>
                                                            <input type="text" class="form-control" id="link-input" name="link" value="{{ old('link') ? old('link') : $link['link'] }}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                                            حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                                @else
                                                <div data-repeater-item class="align-items-center">
                                                    <div class="row">
                                                        <div class="col-lg-6 ">
                                                            <label for="type-input">عنوان</label>
                                                            <input type="text" class="form-control" id="type-input" name="type" value="{{ old('type-input')}}">
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="link-input">لینک</label>
                                                            <input type="text" class="form-control" id="link-input" name="link" value="{{ old('link')}}">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="col-md-4">
                                                        <a href="javascript:;" data-repeater-delete="" class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                                            حذف
                                                        </a>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__footer">
                        <x-submit-button />
                    </div>
                </form>
            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .thumbnail .custom-file-label span {
        position: absolute;
        background-color: lightyellow;
        padding: 5px;
        border: 1px solid gray;
        border-radius: 10px;
        visibility: hidden;
        color: black;
        text-decoration: none;
    }

    .thumbnail .custom-file-label span img {
        border-width: 0;
        max-width: 400px;
        max-height: 200px;
        padding: 2px;
    }

    .thumbnail:hover .custom-file-label span {
        visibility: visible;
        top: 65%;
        left: 50%;
        z-index: 50;
    }

</style>
@endpush

@push('scripts')
<script src="{{asset("js/dashboard/ktavatar.js")}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.kt-select2').select2({});
    });

</script>
<script type="text/javascript" src="{{ asset('/js/dashboard/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        let description = CKEDITOR.replace('aboutUs[description]', {});
    });

</script>
@endpush

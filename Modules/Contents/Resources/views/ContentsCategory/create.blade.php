@extends('layouts.Dashboard.master')

@section('title', 'افزوودن دسته بندی')

@if($parent_id != 0)
    @section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('contents-create-categories', $parent_id))
@else
    @section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('contents-create-home-categories'))
@endif

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
                                افزودن دسته بندی
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <form action="{{ route('admin.contents-category.store', ['parent_id' => $parent_id]) }}" method="post" class="kt-form"
                              enctype="multipart/form-data">
                            @csrf
                            @include('contents::ContentsCategory.partials.form')
                        </form>
                    </div>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection

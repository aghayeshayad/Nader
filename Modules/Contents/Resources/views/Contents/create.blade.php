@extends('layouts.Dashboard.master')

@section('title', 'افزودن مقاله')

@if($category_id != 0)
    @section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('contents-create-contents', $category_id))
@else
    @section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('contents-create-home-contents'))
@endif

@section('error', true);

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <form action="{{ route('admin.contents.store', ['category_id' => $category_id]) }}" method="post" class="kt-form"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    افزودن مقاله
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            @include('contents::Contents.partials.form')
                        </div>
                    </form>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection

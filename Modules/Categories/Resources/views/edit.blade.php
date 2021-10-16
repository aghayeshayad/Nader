@extends('layouts.Dashboard.master')

@section('title', 'ویرایش دسته‌بندی')
@section('error', true);

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <form action="{{ route('admin.categories.update', $category->id) }}" method="post" class="kt-form"
                          enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    ویرایش دسته‌بندی
                                </h3>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            @include('categories::partials.form')
                        </div>
                    </form>
                </div>
                <!--end::Portlet-->
            </div>
        </div>
    </div>
@endsection

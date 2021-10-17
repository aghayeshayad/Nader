@extends('layouts.Dashboard.master')

@section('title', 'افزودن دسته‌بندی')

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="row">
            <div class="col-lg-12">
                <!--begin::Portlet-->
                <div class="kt-portlet">
                    <form action="{{ route('admin.categories.store') }}" method="post" class="kt-form"
                          enctype="multipart/form-data">
                        @csrf
                        <input type="text" class="d-none" name="parent_id" value="{{ $id }}">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    افزودن دسته‌بندی
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

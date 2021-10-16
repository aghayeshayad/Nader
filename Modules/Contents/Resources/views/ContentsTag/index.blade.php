@extends('layouts.Dashboard.master')

@section('title', 'لیست تگ ها')
@section('breadCrumb', \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('list-contents_tag'))

@section('content')
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon2-line-chart"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        لیست تگ ها
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            <a href="{{ route('admin.contents-tags.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                جدید
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1"
                       data-link="{{ route('admin.contents-tags.ajax.list') }}">
                    <thead>
                    <tr>
                        <th>ردیف</th>
                        <th>عنوان</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{--Start datatable scripts--}}
    <script type="text/javascript" src="{{ asset('js/Dashboard/DataTable/DataTable.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            let columns = [
                {data: 'id'},
                {data: 'title'},
                {data: 'actions'},
            ];
            tables('#kt_table_1', columns).init();
        });
    </script>
    {{--End datatable scripts--}}
@endpush

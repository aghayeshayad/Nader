<div class="row">
    {{--Begin title input--}}
    <div class="form-group col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" name="title" placeholder="لطفا عنوان را وارد نمایید."
               id="title-input" value="{{ old('title') ?? $category -> title }}" required>
    </div>
    {{--End title input--}}

    {{--Begin title_page input--}}
    <div class="form-group col-lg-6">
        <label for="title_page-input">عنوان صفحه</label>
        <input type="text" class="form-control" name="title_page"
               placeholder="لطفا عنوان صفحه دسته بندی را وارد نمایید."
               id="title_page-input" value="{{ old('title_page') ?? $category -> title_page }}" required>
    </div>
    {{--End title_page input--}}

    {{--Begin image input--}}
    <div class="form-group col-lg-6">
        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
            <div class="kt-avatar__holder"
                 style="background-image: url('{{ $category ->image }}')"></div>
            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="ویرایش تصویر">
                <i class="fa fa-pen"></i>
                <input type="file" name="image" accept=".png, .jpg, .jpeg">
            </label>
            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="حذف تصویر">
														<i class="fa fa-times"></i>
													</span>
            <span>سایز تصویر 400*300</span>
        </div>
    </div>
    {{--End image input--}}

    {{--Begin order_by input--}}
    <div class="form-group col-lg-6">
        <label for="order_by-input">اولویت</label>
        <input type="number" id="order_by-input" class="form-control" name="order_by" value="{{ old('order_by') ?? $category -> order_by }}">
    </div>
    {{--End order_by input--}}

    {{--Begin meta_description input--}}
    <div class="form-group col-lg-12">
        <label for="meta_description-input">توضیحات متا</label>
        <textarea name="meta_description" id="meta_description-input" rows="5" class="form-control"
                  placeholder="لطفا توضحات متا را وارد نمایید.(بهتر است بین 500 - 700 کاراکتر باشد)"
                  required>{!! $category->meta_description !!}</textarea>
    </div>
    {{--End meta_description input--}}

    {{--Begin short_description input--}}
    <div class="form-group col-lg-12">
        <label for="short_description-input">توضیحات کوتاه</label>
        <textarea name="short_description" id="short_description-input" rows="5" class="form-control"
                  placeholder="لطفا توضحات کوتاه را وارد نمایید.">{!! $category->short_description !!}</textarea>
    </div>
    {{--End short_description input--}}

    {{--Begin description input--}}
    <div class="form-group col-sm-12">
        <label for="description-input">توضیحات</label>
        <textarea name="description" id="description-input" rows="5" class="form-control"
                  placeholder="لطفا توضحات مقاله را وارد نمایید.">{!! $category->description !!}</textarea>
    </div>
    {{--End description input--}}
    <br>
</div>

@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('.kt-select2').select2({});
        });
    </script>
    {{--start avatar scripts--}}
    <script src="{{asset("js/file-upload/ktavatar.js")}}"></script>

    {{--CKEditor scripts--}}
    <script type="text/javascript" src="{{ asset('/js/Dashboard/ckeditor/ckeditor.js') }}"></script>
    @include('ckfinder::setup')
    <script type="text/javascript">
        $(document).ready(function () {
            let description = CKEDITOR.replace('description-input', {});
            CKFinder.setupCKEditor(description);
        });
    </script>
@endpush

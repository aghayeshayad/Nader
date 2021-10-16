<div class="form-group row">
    {{--Begin title inputs--}}
    <div class="col-lg-6">
        <label for="title-input">عنوان</label>
        <input type="text" class="form-control" placeholder="لطفا عنوان را وارد نمایید."
               name="title" id="title-input" value="{{ old('title') ?? $content -> title }}" required>
    </div>
    {{--End title inputs--}}

    {{--Begin title_page inputs--}}
    <div class="col-lg-6">
        <label for="title_page-input">عنوان صفحه</label>
        <input type="text" class="form-control" placeholder="لطفا عنوان صفحه را وارد نمایید."
               name="title_page" id="title_page-input" value="{{ old('title_page') ?? $content -> title_page }}"
               required>
    </div>
    {{--End title_page inputs--}}
</div>

<div class="form-group row">
    {{--Begin tags inputs--}}
    <div class="col-lg-6">
        <label for="tag-selector">تگ های انتخابی</label>
        <select class="form-control kt-select2 tags" id="tag-selector" multiple name="tags[]"
                data-placeholder="لطفا تگ های مرتبط را انتخاب نمایید.">
            <option></option>
            @foreach($tags as $tag)
                <option value="{{ $tag->id }}"
                @foreach($content->ContentTags as $item)
                    {{ (old('tags') ?? $item->id == $tag->id) ? 'selected' : '' }}
                    @endforeach
                >{{ $tag->title }}</option>
            @endforeach
        </select>
    </div>
    {{--End tags inputs--}}

    {{--Begin Related_content inputs--}}
    <div class="col-lg-6">
        <label for="Related_content-selector">مقالات مرتبط</label>
        <select class="form-control kt-select2" id="Related_content-selector" multiple name="Related_content[]"
                data-placeholder="لطفا مقالات مرتبط را انتخاب نمایید.">
            <option></option>
            @foreach($related_contents as $rel_content)
                <option value="{{ $rel_content-> id }}"
                @foreach($content->Related_contents as $item)
                    {{ (old('Related_content') ?? $item->id == $rel_content->id) ? 'selected' : '' }}
                    @endforeach
                >{{ $rel_content->title }}</option>
            @endforeach
        </select>
    </div>
    {{--End Related_content inputs--}}
</div>

<div class="form-group row">
    {{--Begin link_video inputs--}}
    <div class="col-lg-6">
        <label for="link_video-input">لینک ویدئو</label>
        <input type="text" class="form-control" placeholder="لطفا لینک ویدئو را وارد نمایید."
               name="link_video" id="link_video-input" value="{{ old('link_video') ?? $content -> link_video }}">
    </div>
    {{--End link_video inputs--}}

    {{--Begin file inputs--}}
    <div class="col-lg-6">
        <label for="file-input">فایل</label>
        <input type="file" class="custom-file-input" id="file-input" name="file">
        <label class="custom-file-label m-input" for="file-input">لطفا یک فایل انتخاب نمایید.</label>
    </div>
    {{--End file inputs--}}
</div>

{{--Begin image inputs--}}
<div class="col-lg-6">
    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar_1">
        <div class="kt-avatar__holder"
             style="background-image: url('{{ $content->image }}')"></div>
        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="ویرایش تصویر">
            <i class="fa fa-pen"></i>
            <input type="file" name="image" accept=".png, .jpg, .jpeg">
        </label>
        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="حذف تصویر">
														<i class="fa fa-times"></i>
            </span>
        <p>سایز تصویر 800*600</p>
    </div>
</div>
{{--End image inputs--}}

{{--start images input--}}
<div class="row">
    <div class="form-group col-lg-12">
        <div class="col-lg-12" id="kt_repeater_1">
            <div class="form-group form-group-last" id="kt_repeater_1">
                <div class="form-group form-group-last row mb-3">
                    <label class="col-lg-2 col-form-label">تصاویر بیشتر:</label>
                    <div class="col-lg-4">
                        <a href="javascript:" data-repeater-create=""
                           class="btn btn-bold btn-sm btn-label-brand">
                            <i class="la la-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div data-repeater-list="images" class="col-lg-12 row multi-images">
                    <div data-repeater-item style="display: none" class="col-lg-4 form-group align-items-center">
                        <div class="col-lg-9 col-md-4 col-sm-12">
                            <input type="file" id="related-image-input" name="images"
                                   accept="image/png,image/jpeg">
                            <br>
                            <br>
                            <div class="col-md-4">
                                <a href="javascript:" data-repeater-delete=""
                                   class="btn-sm btn btn-label-danger btn-bold  delete-img" name-img="">
                                    Delete
                                </a>
                            </div>
                        </div>
                    </div>
                    @foreach($content->images as $image)
                        <div data-repeater-item class="col-lg-4 form-group align-items-center">
                            <div class="col-lg-9 col-md-4 col-sm-12">
                                <img src="{{ asset('Uploads/Contents/'.$content->id.'/images/'.$image) }}"
                                     style="width: 115px" class="related-image">
                                <br>
                                <br>
                                <div class="col-md-4">
                                    <a href="javascript:" data-repeater-delete=""
                                       class="btn-sm btn btn-label-danger btn-bold delete-product-img"
                                       name-img=""
                                       data-link="{{ route('admin.products.ajax.delete-image') }}"
                                       data-image-name="{{ $image }}" data-id="{{ $content->id }}">
                                        Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
{{--end images input--}}

<div class="form-group row">
    {{--Begin published_at inputs--}}
    <div class="col-lg-12">
        <label for="datepicker">تاریخ انتشار</label>
        <input name="date_input1" id="normalAlt2" class="form-control" disabled/>
        <input name="published_at" id="datepicker" class="form-control"
               value="{{ old('published_at') ?? $content->published_at }}"/>
    </div>
    {{--End publishhed_at inputs--}}
</div>

{{--Begin meta_description input--}}
<div class="form-group">
    <label for="meta_description-input">توضیحات متا</label>
    <textarea name="meta_description" id="meta_description-input" rows="5" class="form-control"
              placeholder="لطفا توضیحات متا را برای گوگل وارد نمایید.(بهتر است بین 500 - 700 کاراکتر باشد)"
              required>{!! $content->meta_description !!}</textarea>
</div>
{{--End meta_description input--}}

{{--Begin short_description input--}}
<div class="form-group">
    <label for="short_description-input">توضیحات کوتاه</label>
    <textarea name="short_description" id="short_description-input" rows="5" class="form-control"
              placeholder="لطفا توضیحات کوتاه را وارد نمایید.">{!! $content->meta_description !!}</textarea>
</div>
{{--End short_description input--}}

{{--Begin description input--}}
<div class="form-group">
    <label for="description-input">توضیحات</label>
    <textarea name="description" id="description-input" rows="5" class="form-control"
              placeholder="لطفا توضیحات مقاله را وارد نمایید.">{!! $content->description !!}</textarea>
</div>
{{--End description input--}}

@component('Components.Dashboard.Form.submit-button')@endcomponent

@push('styles')
    <link rel="stylesheet" href="{{ asset('js\Dashboard\css\persian-datepicker.css') }}">
@endpush

@push('scripts')

    {{--start avatar scripts--}}
    <script src="{{asset("js/file-upload/ktavatar.js")}}"></script>
    {{--start avatar scripts--}}

    {{--Select2 scripts--}}
    <script type="text/javascript">
        $(document).ready(function () {
            $('.kt-select2').select2({});
            $('.tags').select2({
                tags: true
            });
        });
    </script>

    {{--CKEditor scripts--}}
    <script type="text/javascript" src="{{ asset('/js/Dashboard/ckeditor/ckeditor.js') }}"></script>
    @include('ckfinder::setup')
    <script type="text/javascript">
        $(document).ready(function () {
            let description = CKEDITOR.replace('description-input', {});
            CKFinder.setupCKEditor(description);
        });
    </script>

    {{--DateTimePicker scripts--}}
    <script src="{{asset("js/Dashboard/persian-calendar/persian-date.min.js")}}"></script>
    <script src="{{asset("js/Dashboard/persian-calendar/persian-datepicker.js")}}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#datepicker').persianDatepicker({
                initialValue: true,
                initialValueType: 'gregorian',
                altField: '#normalAlt2',
                altFormat: 'LLLL',
                observer: true,
                format: 'YYYY/MM/DD H:mm',
                timePicker: {
                    enabled: true
                }
            });
        });
    </script>
@endpush

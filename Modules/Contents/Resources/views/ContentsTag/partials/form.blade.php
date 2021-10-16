<div class="form-group">
    <div class="row">
        <div class="col-6">
            <label for="title-input">عنوان</label>
            <input type="text" class="form-control" id="title-input" placeholder="لطفا عنوان تگ را وارد نمایید."
                   name="title" value="{{ old('title') ?? $tag -> title }}" required>
        </div>
        <div class="col-6">
            <label for="title-page-input">عنوان صفحه</label>
            <input type="text" class="form-control" id="title-page-input"
                   placeholder="لطفا عنوان صفحه تگ را وارد نمایید."
                   name="title_page" value="{{ old('title_page') ?? $tag -> title_page }}" required>
        </div>
    </div>
</div>

{{--Begin meta_description input--}}
<div class="form-group">
    <label for="meta_description-input">توضیحات متا</label>
    <textarea name="meta_description" id="meta_description-input" rows="5" class="form-control"
              placeholder="لطفا توضیحات متا را برای گوگل وارد نمایید.(بهتر است بین 500 - 700 کاراکتر باشد)"
              required>{!! $tag->meta_description !!}</textarea>
</div>
{{--End meta_description input--}}

{{--Begin short_description input--}}
<div class="form-group">
    <label for="short_description-input">توضیحات کوتاه</label>
    <textarea name="short_description" id="short_description-input" rows="5" class="form-control"
              placeholder="لطفا توضیحات کوتاه را وارد نمایید.">{!! $tag->meta_description !!}</textarea>
</div>
{{--End short_description input--}}

{{--Begin description input--}}
<div class="form-group">
    <label for="description-input">توضیحات</label>
    <textarea name="description" id="description-input" rows="5" class="form-control"
              placeholder="لطفا توضیحات مقاله را وارد نمایید.">{!! $tag->description !!}</textarea>
</div>
{{--End description input--}}

@component('Components.Dashboard.Form.submit-button')@endcomponent

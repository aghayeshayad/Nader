<div class="form-group">
    <label for="title-input">عنوان</label>
    <input type="text" class="form-control" name="title"
        value="{{ old('title') ? old('title') : $category->title }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success btn-sm">ثبت</button>
</div>
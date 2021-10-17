@if (!$category->deleted_at)
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
        data-link="{{ route('admin.categories.ajax.destroy', $category->id) }}">
        حذف
    </button>
    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
    <a href="{{ route('admin.subcategories.show', $category->id) }}" class="btn btn-primary btn-sm">زیردسته‌ها</a>
@elseif($category->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
        data-link="{{ route('admin.categories.ajax.restore', $category->id) }}">
        بازگردانی
    </button>
@endif

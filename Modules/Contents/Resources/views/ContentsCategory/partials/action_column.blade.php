@if(!$category->deleted_at)
    <a href="{{ route('admin.contents-category.index', $category -> id) }}" class="btn btn-dark2 btn-sm">زیر دسته</a>
    @if($category->status)
        <button type="button" class="btn btn-warning btn-sm" action-method="POST"
                data-id="{{ $category -> id }}" button-type="disable"
                data-link="{{ route('admin.contents-category.ajax.disable') }}">عدم نمایش</button>
    @elseif(!$category->status)
        <button type="button" class="btn btn-success btn-sm" action-method="POST"
                data-id="{{ $category -> id }}" button-type="enable"
                data-link="{{ route('admin.contents-category.ajax.enable') }}">نمایش</button>
    @endif
    @if (count($child->get()) == 0 && count($contents->get()) == 0)
        <button type="button" class="btn btn-danger btn-sm" button-type="delete" action-method="POST"
                data-link="{{ route('admin.contents-category.ajax.destroy', $category->id) }}">حذف
        </button>
    @endif

        <a href="{{ route('admin.contents-category.edit', $category -> id) }}" class="btn btn-primary btn-sm">ویرایش</a>
@elseif($category->deleted_at)
    <button class="btn btn-primary btn-block btn-sm" button-type="restore" action-method="POST"
            data-link="{{ route('admin.contents-category.ajax.restore') }}" data-id="{{ $category -> id }}">بازگردانی
    </button>
@endif


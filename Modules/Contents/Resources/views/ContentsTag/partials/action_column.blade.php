@if(!$tag->deleted_at)
    @if($tag->status)
        <button type="button" class="btn btn-warning btn-sm" action-method="POST"
                data-id="{{ $tag -> id }}" button-type="disable"
                data-link="{{ route('admin.contents-tags.ajax.disable') }}">عدم نمایش</button>
    @elseif(!$tag->status)
        <button type="button" class="btn btn-success btn-sm" action-method="POST"
                data-id="{{ $tag -> id }}" button-type="enable"
                data-link="{{ route('admin.contents-tags.ajax.enable') }}">نمایش</button>
    @endif
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
            data-link="{{ route('admin.contents-tags.ajax.destroy', $tag->id) }}">حذف
    </button>
    <a href="{{ route('admin.contents-tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">ویرایش</a>
@elseif($tag->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
            data-link="{{ route('admin.contents-tags.ajax.restore') }}" data-id="{{ $tag -> id }}">بازگردانی
    </button>
@endif

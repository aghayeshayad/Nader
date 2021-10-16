@if(!$content->deleted_at)
    @if($content->status)
        <button type="button" class="btn btn-warning btn-sm" action-method="POST"
        data-id="{{ $content -> id }}" button-type="disable"
        data-link="{{ route('admin.contents.ajax.disable') }}">عدم نمایش</button>
    @elseif(!$content->status)
        <button type="button" class="btn btn-success btn-sm" action-method="POST"
                data-id="{{ $content -> id }}" button-type="enable"
                data-link="{{ route('admin.contents.ajax.enable') }}">نمایش</button>
    @endif
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
    data-link="{{ route('admin.contents.ajax.destroy', $content -> id) }}">
        حذف
    </button>
    <a href="{{ route('admin.contents.edit', $content -> id) }}" class="btn btn-primary btn-sm">
        ویرایش
    </a>
@elseif($content->deleted_at)
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
    data-id="{{ $content -> id }}" data-link="{{ route('admin.contents.ajax.restore') }}">
        بازگردانی
    </button>
@endif

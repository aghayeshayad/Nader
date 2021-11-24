@if (!$discount->deleted_at)
    <a href="{{ route('admin.discounts.show', $discount->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
        data-link="{{ route('admin.discounts.ajax.destroy', $discount->id) }}">
        حذف
    </button>
@else
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
        data-link="{{ route('admin.discounts.ajax.restore', $discount->id) }}">
        بازگردانی
    </button>
@endif

@if (!$product->deleted_at)
    <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
    <button type="button" class="btn btn-danger btn-sm" action-method="POST" button-type="delete"
        data-link="{{ route('admin.products.ajax.destroy', $product->id) }}">
        حذف
    </button>
@else
    <button type="button" class="btn btn-primary btn-block btn-sm" action-method="POST" button-type="restore"
        data-link="{{ route('admin.products.ajax.restore', $product->id) }}">
        بازگردانی
    </button>
@endif

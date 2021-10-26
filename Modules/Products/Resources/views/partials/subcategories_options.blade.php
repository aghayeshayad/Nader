@foreach ($categories as $category)
    <option value="{{ $category->id }}"
        {{ ($product && $product->sub_subcategory_id == $category->id) ? 'selected' : '' }}>
        {{ $category->title }}
    </option>
@endforeach

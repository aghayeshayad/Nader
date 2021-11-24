<div class="form-group row">
    <div class="col-lg-3">
        <label for="discount-input">درصد تخفیف</label>
        <input type="number" class="form-control" id="discount-input" name="discount"
        value="{{ old('discount') ?? $discount->discount }}">
    </div>
    <div class="col-lg-3">
        <label form="date-start">تاریخ شروع</label>
        <input type="text" name="start_date" class="form-control" id="date-start"
            value="{{ old('start_date') ?? $discount->start_date }}" />
    </div>
    <div class="col-lg-3">
        <label form="date-end">تاریخ پایان</label>
        <input type="text" name="end_date" class="form-control" id="date-end"
            value="{{ old('end_date') ?? $discount->end_date }}" />
    </div>
    <div class="col-lg-3">
        <label for="product-selector">محصولات</label>
        <select name="products[]" id="product-selector" style="width: 100%" multiple>
            @foreach ($products as $product)
                <option value="{{ $product->id }}"
                    {{ in_array($product->id, $discount->Products()->pluck('id')->toArray()) ? 'selected' : '' }}>
                    {{ $product->title }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-success btn-sm">ثبت</button>
</div>

@push('styles')
    <link rel="stylesheet" href="{{ asset('js/dashboard/bootstrap-datepicker-fa/dist/css/persian-datepicker.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/dashboard/bootstrap-datepicker-fa/dist/js/persian-date.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/bootstrap-datepicker-fa/dist/js/persian-datepicker.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#date-start').persianDatepicker({
                initialValue: true,
                initialValueType: 'gregorian',
                altField: '#date-held-alert',
                altFormat: 'LLLL',
                observer: true,
                format: 'YYYY/MM/DD',
                timePicker: {
                    enabled: false
                }
            });

            $('#date-end').persianDatepicker({
                initialValue: true,
                initialValueType: 'gregorian',
                altField: '#date-held-alert',
                altFormat: 'LLLL',
                observer: true,
                format: 'YYYY/MM/DD',
                timePicker: {
                    enabled: false
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#product-selector').select2({});
        });
    </script>
@endpush

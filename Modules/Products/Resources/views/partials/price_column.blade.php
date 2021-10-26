<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" 
    data-target="#kt_modal_{{ $product->id }}">
    قیمت محصول
</button>

<div class="modal fade" id="kt_modal_{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">لیست قیمت محصول</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">ردیف</th>
                            <th scope="col">رنگ</th>
                            <th scope="col">تعداد</th>
                            <th scope="col">مبلغ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (collect($product->Prices)->isNotEmpty())
                            @foreach ($product->Prices as $price)
                                <tr>
                                    <th scope="row">{{ $price->id }}</th>
                                    <td>{{ \Modules\Products\Entities\Product::COLORS[$price->color_code] }}</td>
                                    <td>{{ $price->count }}</td>
                                    <td>{{ $price->price }}</td>
                                </tr>
                            @endforeach
                        @else
                            <div class="text-center">
                                <strong>لیست قیمتی برای این محصول وارد نشه است.</strong>
                            </div>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

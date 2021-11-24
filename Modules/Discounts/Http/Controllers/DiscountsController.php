<?php

namespace Modules\Discounts\Http\Controllers;

use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Discounts\Entities\Discount;
use Modules\Discounts\Http\Requests\DiscountStoreRequest;
use Modules\Discounts\Http\Requests\DiscountUpdateRequest;
use Modules\Products\Entities\Product;
use Yajra\DataTables\Facades\DataTables;

class DiscountsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('discounts::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Discount $discount)
    {
        $products = Product::where('status', 1)->get();

        return view('discounts::create', compact('discount', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DiscountStoreRequest $request, Discount $discount)
    {
        $this->fillRequest($request, $discount);

        return redirect()->to(route('admin.discounts.index'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $discount = Discount::find($id);
        $products = Product::where('status', 1)->get();

        return view('discounts::edit', compact('discount', 'products'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(DiscountUpdateRequest $request, $id)
    {
        $discount = Discount::find($id);
        $this->fillRequest($request, $discount);

        return redirect()->to(route('admin.discounts.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     */
    public function destroy($id)
    {
        Discount::where('id', $id)->delete();
    }

    /**
     * Restore the specified resource from storage.
     * @param int $id
     */
    public function restore($id)
    {
        Discount::withTrashed()->where('id', $id)->restore();
    }

    /**
     * Return categories list data
     * 
     * @return json
     */
    public function list()
    {
        return DataTables::of(Discount::withTrashed())
            ->addColumn('start_date', function ($discount) {
                return $discount->persianStartDate;
            })->addColumn('end_date', function ($discount) {
                return $discount->persianEndDate;
            })->addColumn('actions', function ($discount) {
                return $this->actionColumn($discount);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Return categories action column
     * 
     * @param \Modules\Discounts\Entities\Discount $discount
     */
    protected function actionColumn($discount)
    {
        return view('discounts::partials.action_column', compact('discount'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var \Illuminate\Http\Request $request
         * @var \Modules\Discounts\Entities\Discount $model
         */
         $discount = $model->fill($request->only($model->getFillable()));
         $model->saveOrFail();

         $discount->Products()->sync($request->products);
    }
}

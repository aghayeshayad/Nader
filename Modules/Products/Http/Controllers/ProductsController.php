<?php

namespace Modules\Products\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\Products\Entities\Product;
use Modules\Products\Http\Requests\ProductStoreRequest;
use Modules\Products\Http\Requests\ProductUpdateRequest;
use Modules\Tags\Entities\Tag;
use Yajra\DataTables\Facades\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('products::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Product $product)
    {
        $categories = Category::whereNull('parent_id')->get();
        $tags = Tag::all();

        return view('products::create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(ProductStoreRequest $request, Product $product)
    {
        $this->fillRequets($request, $product);

        return redirect()->to(route('admin.products.index'));
    }

    /**
     * Show the specified resource.
     * 
     * @param \Modules\Products\Entities\Product $product
     * @return Renderable
     */
    public function show(Product $product)
    {
        $categories = Category::whereNull('parent_id')->get();
        $tags = Tag::all();

        return view('products::edit', compact('product', 'categories', 'tags'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('products::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->fillRequets($request, $product);

        return redirect()->to(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param \Modules\Products\Entities\Product $product
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }

    /**
     * Restore the specified resource from storage.
     * 
     * @param int $id
     */
    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
    }

    public function getSubcategories(Request $request, Product $product)
    {
        $categories = Category::where('parent_id', $request->id)->get();

        if($request->has('productId')) {
            $product = Product::find($request->productId);
        }

        return view('products::partials.subcategories_options', compact('categories', 'product'));
    }

    public function getSubSubcategories(Request $request, Product $product)
    {
        $categories = Category::where('parent_id', $request->id)->get();

        if($request->has('productId')) {
            $product = Product::find($request->productId);
        }

        return view('products::partials.sub_subcategories_options', compact('categories', 'product'));
    }

    /**
     * Return categories list data
     * 
     * @return json
     */
    public function list()
    {
        return DataTables::of(Product::withTrashed())
            ->addColumn('actions', function ($product) {
                return $this->actionColumn($product);
            })->addColumn('price', function ($product) {
                return $this->priceColumn($product);
            })->addColumn('count', function ($product) {
                $counts = $product->Prices()->pluck('count')->toArray();

                return array_sum($counts);
            })->addColumn('type', function ($product) {
                return $product->type;
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Return products action column
     * 
     * @param \Modules\Products\Entities\Product $product
     */
    protected function actionColumn($product)
    {
        return view('products::partials.action_column', compact('product'));
    }

    /**
     * Return products price column
     * 
     * @param \Modules\Products\Entities\Product $product
     */
    protected function priceColumn($product)
    {
        return view('products::partials.price_column', compact('product'));
    }

    private function fillRequets($request, $model)
    {
        /**
         * @var \Illuminate\Http\Request $request
         * @var \Modules\Products\Entities\Product $model
         */
        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();

        $this->syncTagsWithProducts($this->generateTags($request), $model);
        $this->generateProductsInformation($request->informations ?? [], $model);
        $this->syncProductPrices($request->prices ?? [], $model);
    }

    private function generateTags($request)
    {
        // if ($request->has('tags')) {
        //     foreach ($request->tags as $tag) {
        //         Tag::firstOrCreate(
        //             ['id' => $tag],
        //             [
        //                 'title' => $tag,
        //                 'type' => ltrim(Product::class, "Modules\\")
        //             ]
        //         );
        //     }
        // }

        // return Tag::whereIn('id', $request->tags ?? [])
        //         ->orWhereIn('title', $request->tags ?? [])->pluck('id')->toArray();

        $tag = Tag::find(1);

        return [$tag->id => ['model_type' => ltrim(Product::class, "Modules\\")]];
    }

    private function syncTagsWithProducts($tags_id, $model)
    {
        /**
         * @var array $tags_id
         * @var \Modules\Products\Entities\Product $model
         */
        // $model->Tags()->sync($tags_id);
    }

    private function generateProductsInformation($information, $model)
    {
        /**
         * @var array||null $information
         * @var \Modules\Products\Entities\Product $model
         */
        if (!empty($information)) {
            $model->Informations()->create(['information' => json_encode($information)]);
        }
    }

    private function syncProductPrices($prices, $model)
    {
        /**
         * @var array||null $prices
         * @var \Modules\Products\Entities\Product $model
         */
        if (!empty($prices)) {
            foreach ($prices as $price) {
                $model->Prices()->create([
                    'color_code' => $price['color'],
                    'count' => $price['count'],
                    'price' => $price['price']
                ]);
            }
        }
    }
}

<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Modules\Categories\Http\Requests\CategoryStoreRequest;
use Modules\Categories\Http\Requests\CategoryUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('categories::index');
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @param \Modules\Categories\Entities\Category $category
     * @return Response
     */
    public function create(Category $category)
    {
        return view('categories::create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Modules\Categories\Http\Requests\CategoryStoreRequest $request
     * @param \Modules\Categories\Entities\Category $category
     * @return Response
     */
    public function store(CategoryStoreRequest $request, Category $category)
    {
        $this->fillRequest($request, $category);

        return redirect()->to(route('admin.categories.index'))
            ->with('success', 'دسته بندی با موفقیت افزوده شد.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('categories::show');
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * @param \Modules\Categories\Entities\Category $category
     * @return Response
     */
    public function edit(Category $category)
    {
        return view('categories::edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Modules\Categories\Http\Requests\CategoryUpdateRequest $request
     * @param \Modules\Categories\Entities\Category $category
     * @return Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $this->fillRequest($request, $category);

        return redirect()->to(route('admin.categories.index'))
            ->with('success', 'دسته بندی با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param \Modules\Categories\Entities\Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
    }

    /**
     * Restore the specified resource from storage.
     * 
     * @param int $id
     * @return Response
     */
    public function restore($id)
    {
        Category::where('id', $id)->restore();
    }

    /**
     * Return categories list data
     * 
     * @return json
     */
    public function list()
    {
        return DataTables::of(Category::withTrashed()->whereNull('parent_id'))
            ->addColumn('actions', function ($category) {
                return $this->actionColumn($category);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Return categories action column
     * 
     * @param \Modules\Categories\Entities\Category $category
     */
    protected function actionColumn($category)
    {
        return view('categories::partials.action_column', compact('category'));
    }

    /**
     * Fill categories table data
     * 
     * @param \Illuminate\Http\Request $request
     * @param \Modules\Categories\Entities\Category $model
     * @return void
     */
    protected function fillRequest($request, $model)
    {
        /**
         * @var \Illuminate\Http\Request $request
         * @var \Modules\Categories\Entities\Category $model
         */
        $model->fill($request->only($model->getFillable()));
        $model->saveOrFail();
    }
}

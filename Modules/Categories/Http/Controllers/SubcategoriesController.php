<?php

namespace Modules\Categories\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Categories\Entities\Category;
use Yajra\DataTables\Facades\DataTables;

class SubcategoriesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * 
     * @param int $id
     * @param \Modules\Categories\Entities\Category $category
     * @return Renderable
     */
    public function create($id, Category $category)
    {
        return view('categories::subcategories.create', compact('id', 'category'));
    }

    /**
     * Show the specified resource.
     * 
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('categories::subcategories.index', compact('id'));
    }

    /**
     * Return categories list data
     * 
     * @return json
     */
    public function list($id)
    {
        return DataTables::of(Category::withTrashed()->where('parent_id', $id))
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
}

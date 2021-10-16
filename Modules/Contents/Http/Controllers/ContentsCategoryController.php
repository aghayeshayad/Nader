<?php

namespace Modules\Contents\Http\Controllers;

use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Modules\Contents\Entities\Category;
use Modules\Contents\Entities\Content;
use Modules\Contents\Http\Requests\Categories\ContentsCategoryStoreRequest;
use Modules\Contents\Http\Requests\Categories\ContentsCategoryUpdateRequest;

class ContentsCategoryController extends Controller
{
    use uploadFiles;

    /**
     * Display a listing of the resource.
     * @param int $parent_id
     * @return View
     */
    public function index(int $parent_id): View
    {
        $categories = Category::where('parent_id', $parent_id);
        if(count($categories->get()) != 0) {
            return view('contents::ContentsCategory.index', compact('categories', 'parent_id'));
        }
        else{
            if (count(Category::all()) == 0)
                return view('contents::ContentsCategory.index', compact('categories', 'parent_id'));
            else
            {
                $category_id = $parent_id;
                $contents = Content::where('category_id', $parent_id)->get();
                return view('contents::Contents.index', compact('contents', 'category_id'));
            }

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @param int $parent_id
     * @return View
     */
    public function create(Category $category, $parent_id)
    {
        return view('contents::ContentsCategory.create', compact('category', 'parent_id'));
    }

    /**
     * Store a newly created resource in storage.
     * @param ContentsCategoryStoreRequest $request
     * @param Category $category
     * @return Response
     */
    public function store(ContentsCategoryStoreRequest $request, Category $category)
    {
        $this->fillRequest($request, $category);
        session()->flash('success', 'دسته بندی مورد نظر با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('contents::ContentsCategory.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('contents::ContentsCategory.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param ContentsCategoryUpdateRequest $request
     * @param int $category_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ContentsCategoryUpdateRequest $request, $category_id)
    {
        $category = Category::findOrFail($category_id);
        $this->fillRequest($request, $category);
        session()->flash('success', 'دسته بندی مورد نظر با موفقیت ویرایش گردید.');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return response('Ok! Category deleted successfully!', Response::HTTP_OK);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Category::withTrashed()->findOrFail($request->id)->restore();
        return response('Ok!category restored successfully!', Response::HTTP_OK);
    }

    /**
     * Return ContentCategories list data
     * @param int $parent_id
     * @throws /Exception
     * @return Response
     */
    public function list($parent_id)
    {
        return DataTables::of(Category::withTrashed()->where('parent_id', $parent_id))
            ->addColumn('actions', function ($category) {
                return $this->actionColumn($category);
            })->rawColumns(['actions'])->make(true);
    }

    /**
     * Return Category action column
     * @param Category $category
     * @return View
     */
    private function actionColumn($category)
    {
        $child = Category::where('parent_id', $category->id);
        $contents = Content::where('category_id', $category->id);
        return view('contents::ContentsCategory.partials.action_column', compact('category', 'child', 'contents'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var Request $request
         * @var Category $model
         */
        $model->fill($request->except('image'));
        $model->saveOrFail();
        //if it's not a root
        if ($model->parent_id != 0) {
            $model->update([
                'path' => Category::findOrFail($model->parent_id)->path.'-'.$model->id
            ]);
        }
        //if it's a root
        else {
            $model->update([
                'path' => $model->id
            ]);
        }
        //uploading 2 images
        $this->uploadFiles($request, $model);
    }

    //uploading images
    private function uploadFiles($request, $model)
    {
        if ($request->has('image'))
        {
            //if we've already had the image , we delete it
            if($model -> image != null)
            {
                $path = "Uploads/Contents/Categories/$model->id/".$model->getRawOriginal('image');
                File::delete($path);
            }
            //inserting the new image in the place of image
            $path = "Uploads/Contents/Categories/$model->id/$request->image";
            $filepath = "Uploads/Contents/Categories/$model->id";
            $model->update([
                'image' => $this->uploadImage(request(), $model, 'image', $path, $filepath, ['width' => 400, 'height' => 300]),
            ]);
        }
    }

    /**
     * Disable Category
     *
     * @param Request $request
     * @return Response
     */
    public function enable(Request $request)
    {
        Category::where('id', $request->id)->update([
            'status' => 1
        ]);

        return response('Ok! category status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Disable Category
     *
     * @param Request $request
     * @return Response
     */
    public function disable(Request $request)
    {
        Category::where('id', $request->id)->update([
            'status' => 0
        ]);

        return response('Ok! category status changed successfully!', Response::HTTP_OK);
    }

}

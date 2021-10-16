<?php

namespace Modules\Contents\Http\Controllers;

use App\Http\Traits\Dashboard\uploadFiles;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Modules\Contents\Entities\Category;
use Modules\Contents\Entities\Content;
use Modules\Contents\Entities\Tag;
use Modules\Contents\Http\Requests\Contents\ContentStoreRequest;
use Modules\Contents\Http\Requests\Contents\ContentUpdateRequest;
use Yajra\DataTables\DataTables;

class ContentsController extends Controller
{
    use uploadFiles;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param int $category_id
     * @return View
     */
    public function index($category_id)
    {
        return view('contents::Contents.index', compact('category_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Content $content
     * @param int $category_id
     * @return View
     */
    public function create(Content $content, $category_id)
    {
        $tags = Tag::where('status', 1)->get();
        $related_contents = Content::where('status', 1)->get();
        return view('contents::Contents.create', compact('content', 'category_id', 'tags', 'related_contents'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContentStoreRequest $request
     * @param Content $content
     * @return Response
     */
    public function store(ContentStoreRequest $request, Content $content)
    {
        $this->fillRequest($request, $content);
        session()->flash('success', 'مقاله مورد نظر با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('contents::Contents.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        $tags = Tag::where('status', 1)->get();
        $related_contents = Content::all()->except($id);
        return view('contents::Contents.edit', compact('content', 'tags', 'related_contents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContentUpdateRequest $request
     * @param int $id
     * @return Response
     */
    public function update(ContentUpdateRequest $request, $id)
    {
        $contents = Content::findOrFail($id);
        $this->fillRequest($request, $contents);
        session()->flash('success', 'مقاله مورد نظر با موفقیت ویرایش گردید.');
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
        Content::findOrFail($id)->delete();
        return response('Ok!Deleted content successfully!', Response::HTTP_OK);
    }

    /**
     * Restored contents
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Content::withTrashed()->findOrFail($request->id)->restore();
        return response('Ok!Restored content successfully!', Response::HTTP_OK);
    }

    /**
     * Enable contents
     *
     * @param Request $request
     * @return Response
     */
    public function enable(Request $request)
    {
        Content::where('id', $request->id)->update([
            'status' => 1
        ]);
        return response('Ok!Content status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Disable contents
     *
     * @param Request $request
     * @return Response
     */
    public function disable(Request $request)
    {
        Content::where('id', $request->id)->update([
            'status' => 0
        ]);
        return response('Ok!Content status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Return contents list data
     * @param int $category_id
     * @return DataTables
     * @throws \Exception
     */
    public function list($creator_user_id)
    {
        if ($creator_user_id != 0) {
            return DataTables::of(Content::withTrashed()->where('creator_id', $creator_user_id))
                ->addColumn('published_at', function ($content) {
                    return Verta($content->published_at)->format('Y/m/d - H:i:s');
                })->addColumn('actions', function ($content) {
                    return $this->actionColumn($content);
                })->rawColumns(['published_at', 'actions'])->make(true);
        } else {
            return DataTables::of(Content::withTrashed())
                ->addColumn('published_at', function ($content) {
                    return Verta($content->published_at)->format('Y/m/d - H:i:s');
                })->addColumn('actions', function ($content) {
                    return $this->actionColumn($content);
                })->rawColumns(['published_at', 'actions'])->make(true);
        }

    }

    /**
     * Contents list action column
     *
     * @param Content $content
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private function actionColumn($content)
    {
        return view('contents::Contents.partials.action_column', compact('content'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var Content $model
         * @var Request $request
         * @var Category $category
         */
        $tags = $this->generateTags($request);
        $model->fill($request->except('image', 'images', 'author', 'editor', 'file', 'status'));

        //updates the editor
        if ($model->author != null) {
            $model->editor = Auth::user()->id;
            //inserts the ID of the author unless we have an author
        } else {
            $model->author = Auth::user()->id;
        }
        $model->saveOrFail();
        $model->ContentTags()->sync($tags['tags']);
        $model->Related_contents()->sync($request->Related_content);
        $this->uploadFiles($request, $model);
    }

    /**
     * Generate tags and return then
     *
     * @param Request $request
     * @return array
     */
    private function generateTags($request)
    {
        foreach ($request->tags ?? [] as $tag) {
            Tag::firstOrCreate(['id' => $tag], ['title' => $tag, 'title_page' => $tag, 'meta_description' => $tag]);
        }
        return [
            'tags' => Tag::whereIn('id', $request->tags ?? [])->orWhereIn('title', $request->tags ?? [])->pluck('id')->toArray(),
        ];
    }

    private function uploadFiles($request, $model)
    {
        if ($request->has('image')) {
            $path = "Uploads/Contents/$model->id/$model->image";
            $filepath = "Uploads/Contents/$model->id";
            if ($model->image != null) {
                $path = "Uploads/Contents/$model->id/" . $model->getRawOriginal('image');
                File::delete($path);
            }
            $model->update([
                'image' => $this->uploadImage(request(), $model, 'image', $path, $filepath, ['width' => 800, 'height' => 600]),
            ]);
        }
        if ($request->has('images') && $request->images != null) {
            $filePath = 'Uploads/Contents/' . $model->id . '/images';
            $model->update([
                'images' => $this->multiImage($request->images, $model, $filePath, ['width' => 800, 'height' => 600])
            ]);
        }
        if ($request->has('file')) {
            if ($model->file != null) {
                $path = "Uploads/Contents/$model->id/file/" . $model->getRawOriginal('file');
                File::delete($path);
            }
            $path = "Uploads/Contents/$model->id/file/$request->file";
            $filepath = "Uploads/Contents/$model->id/file";
            $model->update([
                'file' => $this->uploadFile(request(), $model, 'file', $path, $filepath)
            ]);
        }
    }
}

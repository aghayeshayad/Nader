<?php

namespace Modules\Contents\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Modules\Contents\Entities\Tag;
use Modules\Contents\Http\Requests\Tags\TagStoreRequest;
use Modules\Contents\Http\Requests\Tags\TagUpdateRequest;
use Yajra\DataTables\DataTables;

class ContentsTagController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index()
    {
        return view('contents::ContentsTag.index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Tag $tag
     * @return View
     */
    public function create(Tag $tag)
    {
        return view('contents::ContentsTag.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Tag $tag
     * @param TagStoreRequest $request
     * @return Response
     * @throws \Throwable
     */
    public function store(TagStoreRequest $request, Tag $tag)
    {
        $this->fillRequest($request, $tag);
        session()->flash('success', 'تگ مورد نظر با موفقیت ذخیره گردید.');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return view('contents::ContentsTag.show');
    }


    /**
     * edit the specified resource.
     * @param int $id
     * @return View
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('contents::ContentsTag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param TagUpdateRequest $request
     * @param int $id
     * @return Response
     * @throws \Throwable
     */
    public function update(TagUpdateRequest $request, $id)
    {
        /**
         * @var Tag $tag
         */
        $tag = Tag::findOrFail($id);
        $this->fillRequest($request, $tag);
        session()->flash('success', 'تگ مورد نظر با موفقیت ویرایش گردید.');
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
        Tag::where('id', $id)->delete();

        return response('Ok!tag deleted successfully.', Response::HTTP_OK);
    }

    /**
     * Restored the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        Tag::withTrashed()->findOrFail($request->id)->restore();

        return response('Ok!tag restored successfully.', Response::HTTP_OK);
    }

    public function list()
    {
        return DataTables::of(Tag::withTrashed())
            ->addColumn('actions', function ($tag) {
                return $this->actionColumn($tag);
            })->rawColumns(['actions'])->make(true);
    }

    private function actionColumn($tag)
    {
        return view('contents::ContentsTag.partials.action_column', compact('tag'));
    }

    /**
     * Enable tag
     *
     * @param Request $request
     * @return Response
     */
    public function enable(Request $request)
    {
        Tag::where('id', $request->id)->update([
            'status' => 1
        ]);
        return response('Ok!Tag status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Disable tag
     *
     * @param Request $request
     * @return Response
     */
    public function disable(Request $request)
    {
        Tag::where('id', $request->id)->update([
            'status' => 0
        ]);
        return response('Ok!Tag status changed successfully!', Response::HTTP_OK);
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var Tag $model
         * @var Request $request
         */
        $model->fill($request->except('author', 'editor', 'status'));

        //updates the editor
        if ($model->author != null) {
            $model->editor = Auth::user()->id;
            //inserts the ID of the author unless we have an author
        } else {
            $model->author = Auth::user()->id;
        }
        $model->saveOrFail();
    }
}

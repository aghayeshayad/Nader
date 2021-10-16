<?php

namespace Modules\Contents\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Modules\Contents\Entities\ContentComments;
use Yajra\DataTables\Facades\DataTables;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contents::ContentsComment.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        ContentComments::findOrFail($id)->delete();
        return response('Ok! Comment deleted successfully!', Response::HTTP_OK);
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     */
    public function restore(Request $request)
    {
        ContentComments::withTrashed()->findOrFail($request->id)->restore();
        return response('Ok! Comment restored successfully!', Response::HTTP_OK);
    }

    /**
     * Enable
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function enable(Request $request)
    {
        ContentComments::where('id', $request->id)->update([
            'status' => 1
        ]);
        return response('Ok!Comment status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Disable
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function disable(Request $request)
    {
        ContentComments::where('id', $request->id)->update([
            'status' => 0
        ]);

        return response('Ok!Comment status changed successfully!', Response::HTTP_OK);
    }

    /**
     * Return list data
     *
     * @return Response
     * @throws /Exception
     */
    public function list()
    {
        return DataTables::of(ContentComments::withTrashed())
            ->addColumn('actions', function ($comment) {
                return $this->actionColumn($comment);
            })
            ->addColumn('user_name', function ($comment) {
                return $comment->user_name;
            })
            ->addColumn('content_name', function ($comment) {
                return $comment->content_name;
            })
            ->addColumn('comment', function ($comment) {
                return "<span class='comment-admin-$comment->id'>" . Str::limit(strip_tags($comment->comment), 70, '...') . "</span>";

            })
            ->addColumn('answer', function ($comment) {
                return "<span class='answer-admin-$comment->id'>" . Str::limit(strip_tags($comment->answer), 70, '...') . "</span>";
            })
            ->addColumn('date_comment', function ($comment) {
                return verta($comment->created_at)->format('d %B Y');
            })
            ->rawColumns(['actions', 'user_name', 'content_name', 'comment', 'answer', 'date_comment'])->make(true);
    }

    /**
     * Return action column
     *
     * @param ContentComments $comment
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    private function actionColumn($comment)
    {
        return view('contents::ContentsComment.partials.action_column', compact('comment'));
    }

    private function fillRequest($request, $model)
    {
        /**
         * @var Request $request
         * @var ContentComments $model
         */
        $model->fill($request->except('author', 'editor'));
        $model->saveOrFail();
        if ($model->author == null) {
            $model->update([
                'author' => Auth::user()->id
            ]);
        } else {
            $model->update([
                'editor' => Auth::user()->id
            ]);
        }
    }

    public function showـcomment(Request $request)
    {
        $comment = ContentComments::where('id', $request->formData['comment_id'])->first();
        $comment->update([
            'comment' => $request->formData['comment'],
            'answer' => $request->formData['answer'],
            'editor' => Auth::user()->id
        ]);
        return response(['answer' => Str::limit(strip_tags($comment->answer), 70, '...'), 'comment' => Str::limit(strip_tags($comment->comment), 70, '...')], Response::HTTP_OK);
    }
}

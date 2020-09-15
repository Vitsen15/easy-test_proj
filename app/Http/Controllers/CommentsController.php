<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StorePost;
use Exception;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CommentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the comments dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Comment::latest()->paginate(15);;

        return view('comments', ['posts' => $posts]);
    }

    /**
     * @param StorePost $request 
     * @return Redirector|RedirectResponse 
     * @throws ValidationException 
     * @throws BindingResolutionException 
     */
    public function create(StorePost $request)
    {
        $data = $request->validated();

        auth()->user()->createPost($data['comment']);

        return redirect('/')->with(['message' => 'Comment has been successfully added.']);
    }

    /**
     * @param Comment $comment 
     * @return void|JsonResponse 
     * @throws BindingResolutionException 
     * @throws HttpException 
     * @throws NotFoundHttpException 
     * @throws Exception 
     */
    public function destroy(Comment $comment)
    {
        if (!auth()->user()->hasPermissionTo('delete posts')) {
            return abort(403);
        }

        $comment->delete();

        return response()->json(['message' => 'Comment has been deleted.']);
    }
}

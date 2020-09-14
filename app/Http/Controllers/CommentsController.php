<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;

class CommentsController extends Controller
{

    /**
     * Show the comments dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->paginate(15);;

        return view('comments', ['posts' => $posts]);
    }

    public function addComment(StorePost $request)
    {
        $data = $request->validated();

        auth()->user()->createPost($data['comment']);

        return redirect('/')->with(['message' => 'Comment has been successfully added.']);
    }
}

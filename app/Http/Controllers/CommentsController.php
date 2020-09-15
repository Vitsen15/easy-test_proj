<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Post;

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

    public function create(StorePost $request)
    {
        $data = $request->validated();

        auth()->user()->createPost($data['comment']);

        return redirect('/')->with(['message' => 'Comment has been successfully added.']);
    }
}

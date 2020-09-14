<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->paginate(15);
        $user = auth()->user();

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }
}

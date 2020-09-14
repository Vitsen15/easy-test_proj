<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
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

    public function showProfileById(User $user)
    {
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(15);

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }
}

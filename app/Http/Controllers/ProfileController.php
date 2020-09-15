<?php

namespace App\Http\Controllers;

use App\Comment;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

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
     * @param User $user 
     * @return View|Factory 
     * @throws BindingResolutionException 
     */
    public function showProfileById(User $user)
    {
        $posts = Comment::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(15);

        return view('profile', ['posts' => $posts, 'user' => $user]);
    }

    /**
     * @param User $user 
     * @return RedirectResponse 
     * @throws BindingResolutionException 
     */
    public function disableUser(User $user)
    {
        if (!auth()->user()->hasPermissionTo('block user')) {
            return abort(403);
        }

        $user->disable();

        return redirect()->back()->with(['message' => 'User has been disabled.']);
    }

    /**
     * @param User $user 
     * @return RedirectResponse 
     * @throws BindingResolutionException 
     */
    public function enableUser(User $user)
    {
        if (!auth()->user()->hasPermissionTo('unblock user')) {
            return abort(403);
        }

        $user->enable();

        return redirect()->back()->with(['message' => 'User has been enabled.']);
    }
}

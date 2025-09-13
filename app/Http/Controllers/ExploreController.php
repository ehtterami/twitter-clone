<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::latest('created_at')->paginate(10);
        return view('explore.index', compact('posts', 'user'));
    }

    public function likePost(Post $post): RedirectResponse
    {
        Auth::user()->likes()->create([
            'post_id' => $post->id
        ]);

        return back();
    }

    public function disLikePost(Post $post): RedirectResponse
    {
        $user = Auth::user();
        $userLiked = $user->likes()->where('post_id', $post->id);

        if ($userLiked) {
            $user->likes()->where('post_id', $post->id)->delete();
        }

        return back();
    }

    public function open(Post $post)
    {
        $user = Auth::user();
        return view('explore.post.index', compact('post', 'user'));
    }

    public function follow(User $user)
    {
        $authUser = Auth::user();
        $authUser->followings()->attach($user->id);
        return back();
    }

    public function unfollow(User $user)
    {
        $authUser = Auth::user();
        $authUser->followings()->detach($user->id);
        return back();
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        if($request->query('id')) {
            $userID = (int) $request->id;
            $user = User::find($userID);
        }
        return view('explore.profile', compact('user'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::whereIn('user_id', $user->followings()->pluck('users.id'))->latest('created_at')->paginate(20);
        return view('home.index', compact('posts', 'user'));
    }
}

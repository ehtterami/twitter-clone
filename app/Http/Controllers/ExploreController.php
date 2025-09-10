<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $posts = Post::latest('created_at')->pagination(10);
        return view('explore.index', compact('posts'));
    }
}

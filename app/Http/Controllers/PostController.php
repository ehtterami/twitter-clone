<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('profile.create-post');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => ['required', 'string', 'max:6000']
        ]);

        $post = Auth::user()->posts()->create($validated);

        if($post) {
            $message = "Your post has been uploaded successfully";
        }

        $message = "Something went wrong";

        return redirect()->route('explore.index')->with('message', $message);
    }

    public function comment(Request $request, Post $post): RedirectResponse
    {
        $validated = $request->validate([
            'body' => ['required', 'max:100', 'string']
        ]);

        Auth::user()->comments()->create([
            'body' => $validated['body'],
            'post_id' => $post->id
        ]);

        return back();
    }
}

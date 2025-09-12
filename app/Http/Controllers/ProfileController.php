<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
    }

    public function liked()
    {
        $likedPosts = Auth::user()->likes()->get();
        return view('profile.liked', compact('likedPosts'));
    }

    public function followings()
    {
        $followings = Auth::user()->followings()->get();
        return view('profile.followings', compact('followings'));
    }

    public function followers()
    {
        $followers = Auth::user()->followed()->get();
        $auth = Auth::user();
        return view('profile.followers', compact('followers', 'auth'));
    }
}

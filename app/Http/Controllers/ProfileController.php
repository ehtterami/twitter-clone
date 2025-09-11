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
}

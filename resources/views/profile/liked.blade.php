@extends('layouts.app')

@section('title', 'Profile')

@section('content')
	<div class="container mt-3">
		<ul class="nav nav-tabs mb-3">
			<li class="nav-item">
				<a class="nav-link @if(request()->is('profile.profile')) active @endif" aria-current="page" href="{{ route('profile.profile') }}">Details</a>
			</li>
			<li class="nav-item">
				<a class="nav-link @if(request()->is('profile.liked')) active @endif" href="{{ route('profile.liked') }}">Liked</a>
			</li>
		</ul>

		@forelse ($likedPosts as $post)
			<div class="alert alert-primary">
				{{ Str::limit($post->post->body, 50) }} by <span class="fw-bold">{{ $post->post->user->name }}</span>
			</div>
		@empty
            <div class="alert alert-dark text-light" role="alert">
				There is no liked posts yet!
			</div>
		@endforelse
	</div>
@endsection

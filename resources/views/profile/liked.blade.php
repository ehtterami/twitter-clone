@extends('layouts.app')

@section('title', 'Profile')

@section('content')
	<div class="container mt-3">
		<x-profile.navbar />

		@forelse ($likedPosts as $post)
			<div class="alert alert-primary mt-3">
				{{ Str::limit($post->post->body, 50) }} by <span class="fw-bold">{{ $post->post->user->name }}</span>
			</div>
		@empty
            <div class="alert alert-dark mt-2" role="alert">
				You did not like anything...
			</div>
		@endforelse
	</div>
@endsection

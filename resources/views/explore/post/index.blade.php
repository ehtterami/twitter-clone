@extends('layouts.app')

@section('title', Str::limit($post->body, 6) . ' by ' . $post->user->name)

@section('content')
	<div class="container">
		<div class="card mt-3">
			<div class="card-header">
				<p class="fw-bold text-secondary fs-6 text-decoration-underline">{{ $post->user->name }}</p>
			</div>
			<div class="card-body">
				<small class="text-muted fw-lighter">Created At: {{ $post->created_at->format('d/m/y') }}</small>
				<p class="fs-5 fw-light text-secondary text-right p-3">{{ $post->body }}</p>
				<div class="mt-2">
					@auth
						@if (!$user->likes()->where('post_id', $post->id)->exists())
							<form action="{{ route('explore.likePost', $post->id) }}" method="POST">
								@csrf
								@method('POST')
								<button type="submit" class="btn btn-sm btn-dark text-light">Like</button>
							</form>
						@else
							<form action="{{ route('explore.disLikePost', $post->id) }}" method="POST">
								@csrf
								@method('POST')
								<button type="submit" class="btn btn-sm btn-danger">Dislike</button>
							</form>
						@endif
					@endauth
				</div>
			</div>
		</div>
	</div>
@endsection

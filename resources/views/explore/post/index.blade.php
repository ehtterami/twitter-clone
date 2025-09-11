@extends('layouts.app')

@section('title', Str::limit($post->body, 6) . ' by ' . $post->user->name)

@section('content')
	<div class="container">
		<div class="card mt-3">
			<div class="card-header">
				<p class="fw-bold text-secondary fs-6 text-decoration-underline">{{ $post->user->name }}</p>
			</div>
			<div class="card- p-3">
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

		<h3 class="fs-4 fw-light mt-5 mb-3">Comments</h3>
		<form action="{{ route('explore.comment', $post) }}" method="POST">
			@csrf
			@method('POST')
			<textarea class="form-control @error('body') is-invalid @enderror" id="postBody" rows="1" name="body" placeholder="I think..."></textarea>
			<div class="d-grid gap-0 mt-3">
				<button type="submit" class="btn btn-primary btn-block">Comment</button>
			</div>
		</form>
		@forelse ($post->comments()->get() as $comment)
			<div class="card mt-2">
				<div class="card-header">{{ $comment->user->name }}</div>
				<div class="card-body p-2">
					{{ $comment->body }}
				</div>
			</div>
		@empty
			<div class="alert alert-dark text-light" role="alert">
				There is no comments yet!
			</div>
		@endforelse
	</div>
@endsection

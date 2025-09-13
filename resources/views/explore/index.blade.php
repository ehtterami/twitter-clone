@extends('layouts.app')

@section('title', 'Explore')

@section('content')
	<div class="container">
		@forelse($posts as $post)
			<div class="card mt-3">
				<div class="card-header">
					<div class="d-flex align-items-center justify-between"><img class="img-thumbnail" width="34" height="34" src="{{ $post->user->avatar }}"
							alt="Profile Image of {{ $post->user->name }}">
						<a href="{{ route('explore.profile', ['id' => $post->user->id]) }}" class="fw-bold text-secondary fs-6 text-decoration-underline">{{ $post->user->name }}</a>
					</div>
					@auth
						@if ($post->user_id !== $user->id)
							@if (!$user->followings()->where('followed_id', $post->user_id)->exists())
								<form action="{{ route('explore.follow', $post->user->id) }}" method="POST">
									@csrf
									@method('POST')
									<button type="submit" class="btn btn-sm btn-outline-dark">Follow</button>
								</form>
							@else
								<form action="{{ route('explore.unfollow', $post->user->id) }}" method="POST">
									@csrf
									@method('POST')
									<button type="submit" class="btn btn-sm btn-danger">Unfollow</button>
								</form>
							@endif
						@endif
					@endauth
				</div>
				<div class="card-body">
					<p class="fs-5 fw-light text-secondary text-right p-3">{{ $post->body }}</p>
					<div class="d-grid mt-2 gap-3">
						@auth
							@if (!$user->likes()->where('post_id', $post->id)->exists())
								<form class="d-grid mt-2 gap-3" action="{{ route('explore.likePost', $post->id) }}" method="POST">
									@csrf
									@method('POST')
									<button type="submit" class="btn btn-sm btn-dark text-light btn-block">Like</button>
								</form>
							@else
								<form class="d-grid mt-2 gap-3" action="{{ route('explore.disLikePost', $post->id) }}" method="POST">
									@csrf
									@method('POST')
									<button type="submit" class="btn btn-sm btn-danger btn-block">Dislike</button>
								</form>
							@endif
						@endauth
						<a href="{{ route('explore.open', $post) }}" class="btn btn-sm btn-primary">Open</a>
					</div>
				</div>
				<div class="card-footer">
					{{ $post->created_at->diffForHumans() }}
				</div>
			</div>
		@empty
			<div class="card">
				<div class="card-body">
					<p class="text-secondary">No Content Available Yet!</p>
				</div>
			</div>
		@endforelse

		<div class="mt-3">
			{{ $posts->links() }}
		</div>
	</div>
@endsection

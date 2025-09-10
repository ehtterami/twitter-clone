@extends('layouts.app')

@section('title', 'Explore')

@section('content')
	<div class="container">
		@forelse($posts as $post)
			<div class="card mt-3">
                <div class="card-header"><p class="fw-bold text-secondary fs-6 text-decoration-underline">{{ $post->user->name }}</p></div>
				<div class="card-body">
					{{ Str::limit($post->body, 50) }}
					<div class="d-grid gap-0 mt-2">
                        <a href="#" class="btn btn-sm btn-primary btn-block">View</a>
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

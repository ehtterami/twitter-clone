@extends('layouts.app')

@section('title', $user->name)

@section('content')
	<div class="container">
		<div class="row mt-3">
			<div class="col-md col-sm-12">
				<div class="card">
					<img src="{{ $user->avatar }}" class="card-img-top" alt="Profile image of {{ $user->name }}">
					<div class="card-body">
						<p class="card-text">{{ $user->bio }}</p>
					</div>
					@auth
						@if (Auth::user()->id !== $user->id)
							@if (!Auth::user()->followings()->where('followed_id', $user->id)->exists())
								<form class="m-3" action="{{ route('explore.follow', $user->id) }}" method="POST">
									@csrf
									@method('POST')
									<button type="submit" class="btn btn-sm btn-outline-dark">Follow</button>
								</form>
							@else
								<form class="m-3" action="{{ route('explore.unfollow', $user->id) }}" method="POST">
									@csrf
									@method('POST')
									<button type="submit" class="btn btn-sm btn-danger">Unfollow</button>
								</form>
							@endif
						@endif
					@endauth
				</div>
			</div>
			<div class="col-md-5 col-sm-12">
				<div class="card">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">Followed: {{ $user->followings()->count() }}</li>
						<li class="list-group-item">Followers: {{ $user->followed()->count() }}</li>
						<li class="list-group-item">Posts: {{ $user->posts()->count() }}</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
@endsection

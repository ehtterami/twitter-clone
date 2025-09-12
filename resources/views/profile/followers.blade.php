@extends('layouts.app')

@section('title', 'Profile')

@section('content')
	<div class="container mt-3">
		<x-profile.navbar />

		@forelse ($followers->chunk(2) as $row)
			<div class="row">
				@foreach ($row as $user)
					<div class="col-md mt-3">
						<div class="card shadow-sm">
							<div class="card-body">
								<h6 class="card-title">{{ $user->name }}</h6>
								@if (!$user->followings()->pluck('users.id'))
									<form action="{{ route('explore.follow', $user->id) }}" method="POST">
										@csrf
										@method('POST')
										<button type="submit" class="btn btn-sm btn-outline-primary">Follow</button>
									</form>
								@else
									<span class="text-muted">Followed by you</span>
								@endif
							</div>
						</div>
					</div>
				@endforeach
			</div>
		@empty
			<div class="alert alert-dark mt-2" role="alert">
				You do not have any followings...
			</div>
		@endforelse
	</div>
@endsection

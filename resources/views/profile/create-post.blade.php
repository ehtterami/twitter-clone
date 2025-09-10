@extends('layouts.app')

@section('title', 'Create new post')

@section('content')
	<div class="container">
		<form action="{{ route('profile.post.store') }}" method="POST" class="card">
            <div class="card-header">Create new post</div>
			<div class="card-body">
				@csrf
				@method('POST')
				<div class="mb-3">
					<label for="postBody" class="form-label">Caption</label>
					<textarea class="form-control @error('body') is-invalid @enderror" id="postBody" rows="3" name="body" placeholder="Lorem ipsum dolor sit amet consectetur adipiscing elit. Dolor sit amet consectetur adipiscing elit quisque faucibus."></textarea>
					<div class="d-grid gap-0 mt-3">
						<button type="submit" class="btn btn-primary btn-block">Save</button>
					</div>
				</div>
			</div>
		</form>
	</div>
@endsection

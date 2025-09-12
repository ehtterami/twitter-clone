@extends('layouts.app')

@section('title', 'Profile')

@section('content')
	<div class="container mt-3">
		<x-profile.navbar />

		<form class="card mt-3 p-5">
			<fieldset disabled>
				<legend>Can not update your information at the moment</legend>
				<div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" id="name" class="form-control" value="{{ $user->name }}">
				</div>
                <div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="text" id="email" class="form-control" value="{{ $user->email }}">
				</div>
			</fieldset>
		</form>
	</div>
@endsection

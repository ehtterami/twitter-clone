@extends('layouts.app')

@section('title', 'Register')

@section('content')
	<div class="container">
		<form action="{{ route('register.store') }}" method="POST" class="card">
			@csrf
			@method('POST')
			<div class="card-body">
                <div class="mb-3">
					<label for="name" class="form-label">Name</label>
					<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name">
				</div>
				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
				</div>
                <div class="mb-3">
					<label for="password" class="form-label">Confirm Password</label>
					<input type="password" name="password_confirmation" class="form-control" id="password">
				</div>
			</div>
			<button type="submit" class="btn btn-primary">Register</button>
		</form>
	</div>
@endsection

@extends('layouts.app')

@section('title', 'Login')

@section('content')
	<div class="container">
		<form action="{{ route('login.store') }}" method="POST" class="card">
			@csrf
			@method('POST')
			<div class="card-body">
				<div class="mb-3">
					<label for="email" class="form-label">Email address</label>
					<input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email">
				</div>
				<div class="mb-3">
					<label for="password" class="form-label">Password</label>
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
					<label class="form-check-label" for="remember">Remember Me</label>
				</div>a
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
	</div>
@endsection

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title') - {{ config('app.name') }}</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container-fluid">
			<a class="navbar-brand" href="{{ route('explore.index') }}">
				<img src="{{ asset('favicon.ico') }}" width="30" height="24" class="d-inline-block align-text-top">
				{{ config('app.name') }}
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#appNav" aria-controls="appNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="appNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link @if (request()->is('explore.index')) active @endif" href="{{ route('explore.index') }}">Explore</a>
					</li>
					<li class="nav-item">
						<a class="nav-link @if (request()->is('profile.create')) active @endif @guest disabled @endguest" href="{{ route('profile.post.create') }}">Write</a>
					</li>
					@guest
						<li class="nav-item">
							<a href="{{ route('login') }}" class="nav-link @if (request()->is('login')) active @endif">Login</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('register') }}" class="nav-link @if (request()->is('register')) active @endif">Register</a>
						</li>
					@endguest
					<li class="nav-item">
						<a class="nav-link" href="https://github.com/ehtterami/twitter-clone">GitHub</a>
					</li>
				</ul>
			</div>
			@auth
				<div class="d-flex">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								{{ Auth::user()->name }}
							</a>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="#">Profile</a></li>
								<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();getElementById('log-out-form').submit();">Log-out</a></li>
								<form action="{{ route('logout') }}" method="POST" class="d-none" id="log-out-form">@csrf @method('POST')</form>
							</ul>
						</li>
					</ul>
				</div>
			@endauth
		</div>
	</nav>
	@yield('content')
</body>

</html>

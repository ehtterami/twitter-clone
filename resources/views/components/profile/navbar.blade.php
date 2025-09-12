<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link @if (request()->is('profile.profile')) active @endif" aria-current="page" href="{{ route('profile.profile') }}">Details</a>
	</li>
    <li class="nav-item">
		<a class="nav-link @if (request()->is('profile.followers')) active @endif" href="{{ route('profile.followers') }}">Followers</a>
	</li>
    <li class="nav-item">
		<a class="nav-link @if (request()->is('profile.followings')) active @endif" href="{{ route('profile.followings') }}">Followings</a>
	</li>
	<li class="nav-item">
		<a class="nav-link @if (request()->is('profile.liked')) active @endif" href="{{ route('profile.liked') }}">Liked</a>
	</li>
</ul>

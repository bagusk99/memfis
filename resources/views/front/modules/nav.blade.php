<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<div class="container">
		<a class="navbar-brand" href="#">MeMFIS Test</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				@if (Auth::check())
					<li class="nav-item active text-light">
						<a class="nav-link" href="javascript:;">Hai {{ Auth::user()->customer->name }}</a>
					</li>
					<li class="nav-item active text-light">
						<a class="nav-link" href="{{ route('auth.logout') }}">Logout</a>
					</li>
				@else
					<li class="nav-item active">
						<a class="nav-link" href="{{ route('auth.login') }}">Login</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="{{ route('auth.register') }}">Register</a>
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>

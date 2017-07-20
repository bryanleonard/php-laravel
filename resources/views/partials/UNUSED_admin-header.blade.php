<nav class="navbar navbar-default">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="{{ route('blog.index') }}">Laravel</a>
			<ul class="nav navbar-nav">
				<li><a href="{{ route('blog.index') }}">Blog <span class="sr-only">(current)</span></a></li>
				<li><a href="{{ route('misc.about') }}">About</a></li>
				<li><a href="{{ route('admin.index') }}">Admin</a></li>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li><a href="{{ route('login') }}">Login</a></li>
					<li><a href="{{ route('register') }}">Register</a></li>
				@else
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endif
			</ul>
		</div>
	</div><!-- /.container-fluid -->
</nav>

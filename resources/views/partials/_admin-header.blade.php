<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('blog.index') }}">Laravel</a>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('admin.index') }}">Posts</a></li>
                <li><a href="{{ route('blog.index') }}">Blog <span class="sr-only">(current)</span></a></li>
		<li><a href="{{ route('misc.about') }}">About</a></li>
		<li><a href="{{ route('admin.index') }}">Admin</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>

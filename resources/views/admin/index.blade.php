@extends('layouts.master')

@section('content')

   @if ( Session::get('info') ) 
		<div class="row">
			<div class="col-md-12">
				<p class="alert alert-info">
					{{Session::get('info')}}
				</p> 
			</div>
		</div>
	@endif

	<div class="row">
		<div class="col-md-12">
			<a href="{{ route('admin.create') }}" class="btn btn-primary">New Post</a>
		</div>
	</div>
	<hr>

	@foreach($posts as $post)
		<div class="row">
			<div class="col-md-12">
				<p class="post-p"><strong>{{$post->title}}</strong> <br>
				{{ str_limit($post->content, $limit = 100, $end = '...') }}
				&nbsp; <br><a href="{{ route('admin.edit', ['id' => $post->id]) }}">Edit</a>&nbsp; | &nbsp;<a href="{{ route('admin.delete', ['id' => $post->id]) }}">Delete</a></p>
			</div>
		</div>
	@endforeach

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $posts->links() }}
		</div>
	</div>
@endsection
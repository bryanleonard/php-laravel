@extends('layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
		<p class="quote">bBlog</p>
		<small class="quote-small">Extra Bs for stuttering</small>
		</div>
	</div>

	@foreach($posts as $post)
		<div class="row">
			<div class="col-md-12 text-center">
				<h1 class="post-title">{{ $post->title }}</h1>
				<?php
					$tags = $post->tags;
				?>
				{{-- 
				@foreach ($tags as $tag)
					- {{$tag->name}} - 
				@endforeach
				--}}

				@if (count($post->tags))
					<p>
						@for ($i=0; $i < count($post->tags); $i++)
							{{$tags[$i]->name}}@if ($i < count($post->tags)-1), @endif
						@endfor
					</p>
				@endif

				<p>{!! $post->content !!}</p>
				<a href="{{ route('blog.post', ['id' => $post->id]) }}">Read more...</a></p>
			</div>
		</div>
		<hr>
	@endforeach

	<div class="row">
		<div class="col-md-12 text-center">
			{{ $posts->links() }}
		</div>
	</div>

@endsection 
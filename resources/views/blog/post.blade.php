@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p class="quote">
                {{ $post->title }}
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $post->content }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-right">
            {{-- {{ $post->likes }} all the likes --}}
            {{-- Inside PostController, w/o likes join, this would've created another query behind the scenes (lazy load vs eager load) --}}
            <p>{{ count($post->likes) }} Likes &nbsp;&nbsp; 
                <a href="{{ route('blog.post.like', ['id' => $post->id]) }}" class="btn btn-sm btn-yolo">Like</a>
            </p> 
        </div>
    </div>
@endsection
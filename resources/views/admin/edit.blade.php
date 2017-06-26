@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
           
            @include('partials._errors') 

            <form action="{{ route('admin.update') }}" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $post['title'] }}">
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <input type="text" class="form-control" id="content" name="content" value="{{ $post['content'] }}">
                </div>
                {{-- <input type="hidden" name="_token" value="{{csrf_toke()}}"> --}}
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$postId}}">
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')

    <div class="container top-buffer">
        @forelse($posts as $post)
            <div class="jumbotron">
                <h3>{{$post->title}}</h3>
                <h5>{{$post->category_id}}</h5>
                <p>{{$post->body}}</p>
            </div>
        @empty
            <p>No posts found</p>
        @endforelse
    </div>

@endsection
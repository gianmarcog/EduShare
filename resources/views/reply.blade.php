@extends('layouts.app')
@section('content')

    <div class="card">
            <div class="card-header">
                <div class="card">
                    @foreach($posts as $post)
                    <div class="card-body">
                        <h4 class="card-heading">{{$post->title}}</h4>
                        <p class="text-right">By: {{$post->user->name}}</p>
                        <p>Das {{$post->body}} </p>
                        <ul class="list-inline list-unstyled">
                            <li><span><i class="glyphicon glyphicon-calendar"> </i>
                            <li> {{$post->created_at->diffForHumans()}} </span> |  comment(s)</li>

                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        @forelse($replies as $reply)
            <div class="card-header">
                <div class="card">
                    <div class="card-body">
                        <p class="text-right">By: {{$reply->user->name}}</p>
                        <p>Das {{$reply->body}} </p>
                    </div>
                    {{$reply->created_at}}
                </div>
            </div>
        @empty
            <p>Be the first to reply</p>
        @endforelse
    </div>

@endsection
@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-12 ml-3">
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
                        <p>{{$reply->body}} </p>
                    </div>
                    {{$reply->created_at}}
                </div>

                {!! Form::open(['route'=> 'delete_reply', 'id' => 'delete-reply-form', 'method' => 'DELETE', 'class' => 'text-right']) !!}

                {!! Form::hidden('reply_id', $reply->id) !!}
                <br/>

                @if(Auth::user()->id === $reply->user_id)
                {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' =>'submit']) !!}
                @endif

                {!! Form::close() !!}
            </div>
        @empty
            <p>Be the first to reply</p>
        @endforelse

        {!! Form::open(['route'=> 'save_reply', 'id' => 'post-question-form']) !!}

        {!! Form::hidden('id',$post->id) !!}

        {!! Form::textarea('body',null, ['id' => 'body','class'=>'form-control','placeholder' => 'Hello my Friends','required']) !!}
        <br/>

        {!! Form::button('Reply', ['class' => 'btn btn-lg btn-primary btn-block', 'type' =>'submit']) !!}


        {!! Form::close() !!}

    </div>
            </div>
        </div>
    </div>

@endsection
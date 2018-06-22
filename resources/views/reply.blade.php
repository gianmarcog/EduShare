@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row top-buffer">
            <div class="col-12 ml-3">
                <div class="card">
                    <div class="card-header">
                        <div class="card">
                            @foreach($posts as $post)
                                <div class="card-body">
                                    <h4 class="card-heading">{{$post->title}}</h4>
                                    <p class="text-right">Von: {{$post->user->name}}</p>
                                    <p> {{$post->body}} </p>
                                    <ul class="list-inline list-unstyled">
                                        <li><span><i class="glyphicon glyphicon-calendar"> </i>
                                        <li> {{$post->created_at->diffForHumans()}} </span> | Antwort(en)</li>

                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @forelse($replies as $reply)
                        <div class="card-header">
                            <div class="card">
                                <div class="card-body">
                                    <p class="text-right">Von: {{$reply->user->name}}</p>
                                    <p>{{$reply->body}} </p>
                                    <p>{{$reply->created_at}}</p>
                                </div>
                            </div>

                            {!! Form::open(['route'=> 'delete_reply', 'id' => 'delete-reply-form', 'method' => 'DELETE', 'class' => 'text-right']) !!}

                            {!! Form::hidden('reply_id', $reply->id) !!}
                            <br/>

                            @if(Auth::user()->id === $reply->user_id || $role->role === 1)
                                {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' =>'submit']) !!}
                            @endif

                            {!! Form::close() !!}
                        </div>
                    @empty
                    @endforelse

                    {!! Form::open(['route'=> 'save_reply', 'id' => 'post-question-form']) !!}

                    {!! Form::hidden('id',$post->id) !!}

                    {!! Form::textarea('body',null, ['id' => 'body','class'=>'form-control','placeholder' => 'Schreibe hier deine Antwort','required']) !!}
                    <br/>

                    {!! Form::button('Antworten', ['class' => 'btn btn-lg btn-primary btn-block', 'type' =>'submit']) !!}


                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
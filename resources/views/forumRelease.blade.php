@extends('layouts.app')
@section('content')

    <div class="card">
        @forelse($posts as $post)
            <div class="card-header">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-heading"><a href="/forum/antworten/{{$post->id}}">{{$post->title}}</a>  </h4>
                    <p class="text-right">By: {{$post->user->name}}</p>
                <p>{{$post->body}}</p>
                    <ul class="list-inline list-unstyled">
                    <li><span><i class="glyphicon glyphicon-calendar"> </i>

                        @if($post->replies->count() > 0)
                          <li> {{$post->created_at->diffForHumans()}} </span> | {{$post->replies->count()}} comment(s)</li>

                            @else()
                            <li> {{$post->created_at->diffForHumans()}} </span> | Antworte du als erster </li>
                            @endif
                </ul>
                    </div>


                    {!! Form::open(['route'=> 'delete_question', 'id' => 'delete-question-form', 'method' => 'DELETE', 'class' => 'text-right']) !!}

                    {!! Form::hidden('post_id', $post->id) !!}
                    <br/>
                    {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' =>'submit']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        @empty
            <p>No posts found</p>
        @endforelse

        {!! $posts-> appends(Request::all())->render() !!}
    </div>

@endsection
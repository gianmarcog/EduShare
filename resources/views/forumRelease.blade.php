@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <form action="{{route('post_question')}}">
                    <button type="submit" class="btn btn-primary btn-block top-buffer mb-4 ">Neuer Post</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @foreach($posts as $post)
                        <div class="card-header">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-heading"><a style="color: #004561"
                                                href="/forum/antworten/{{$post->id}}">{{$post->title}}</a></h4>
                                    <p class="text-right">Von: {{$post->user->name}}</p>
                                    <p>{{$post->body}}</p>
                                    <ul class="list-inline list-unstyled">
                                        <li><span><i class="glyphicon glyphicon-calendar"> </i>
                                        @foreach($categories as $category)
                                            @if($category->id === $post->category_id)
                                                <li> Kategorie: {{$category->name}}</li>
                                            @endif
                                        @endforeach
                                        @if($post->replies->count() > 0)
                                            <li> {{$post->created_at->diffForHumans()}} </span>
                                                | {{$post->replies->count()}} comment(s)
                                            </li>
                                        @else
                                            <li> {{$post->created_at->diffForHumans()}} </span> | Antworte als erster
                                            </li>
                                        @endif
                                    </ul>


                                    {!! Form::open(['route'=> 'delete_question', 'id' => 'delete-question-form', 'method' => 'DELETE', 'class' => 'text-right']) !!}

                                    {!! Form::hidden('post_id', $post->id) !!}
                                    @if(Auth::user()->id === $post->user_id || $role->role === 1)
                                        {!! Form::button('Delete', ['class' => 'btn btn-danger', 'type' =>'submit']) !!}
                                    @endif

                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $posts->render() }}
                    <script>
                        $('.pagination > li').addClass(".page-item");
                        $('.pagination > a').addClass(".page-link");
                    </script>
                </div>
            </div>
        </div>
    </div>

@endsection
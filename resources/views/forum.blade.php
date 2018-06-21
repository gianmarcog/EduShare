@extends('layouts.app')
@section('content')
    @include('layouts.form_errors')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-buffer">
                    <form action="{{route('savePost')}}" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        {!! Form::label('title','Titel') !!}
                        {!! Form::text('title',null, ['id' => 'title', 'class'=>'form-control','placeholder'=>'Titel','required']) !!}
                        <br/>
                        {!! Form::label('body','Text') !!}
                        {!! Form::textarea('body',null, ['id' => 'body','class'=>'form-control','placeholder' => 'Bitte geben Sie Ihren Text ein','required']) !!}
                        <br/>

                    {!! Form::button('Post', ['class' => 'btn btn-lg btn-primary btn-block', 'type' =>'submit']) !!}

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
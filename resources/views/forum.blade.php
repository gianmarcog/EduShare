@extends('layouts.app')
@section('content')
    @include('layouts.form_errors')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div>
                    {!! Form::open (['id'=> 'post-question-form']) !!}

                    {!! Form::label('title','Title') !!}
                    {!! Form::text('title',null, ['id' => 'title', 'class'=>'form-control','placeholder'=>'title','required']) !!}
                    <br/>
                    {!! Form::label('category','Category') !!}
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <br/>
                    {!! Form::label('body','Body') !!}
                    {!! Form::textarea('body',null, ['id' => 'body','class'=>'form-control','placeholder' => 'Bitte geben Sie Ihren Text ein','required']) !!}
                    <br/>

                    {!! Form::button('Post', ['class' => 'btn btn-lg btn-primary btn-block', 'type' =>'submit']) !!}

                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    @include('layouts.form_errors')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="top-buffer">
                    <h3>Wähle die Kategorie:</h3>
                    <form action="/question/finish" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <select name="category" class="form-control top-buffer">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary top-buffer">Weiter zur Eingabe</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
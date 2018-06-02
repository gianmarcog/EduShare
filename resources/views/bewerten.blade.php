@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="top-buffer">Hallo {{Auth::user()->name}}!</h1>
                        <h4>Du kannst folgendes bewerten: </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
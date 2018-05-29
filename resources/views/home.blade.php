@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 top-buffer">
            <div class="panel panel-default">
                <div class="panel-heading">Deine Übersicht:</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Du bist angemeldet als {{ Auth::user()->name }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 top-buffer">
                <h3 class="panel-heading">Deine Übersicht:</h3>
            </div>
            <div class="col-md-8">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="pt-4">Du bist angemeldet als {{ Auth::user()->name }}</p>
                    <p>Deine Mail ist {{ Auth::user()->email }}</p>
                    <p>Deinen Account gibt es seit {{ Auth::user()->created_at }}</p>
                </div>
            </div>
            <div class="col-md-2 mx-auto">
                <img src="/image/ProfilePics/{{Auth::user()->avatar}}"
                     style="width: 150px; height: 150px; border-radius: 50%">
            </div>
            <div class="col-md-2 mx-auto">
                <form enctype="multipart/form-data" action="/home" method="post">
                    <label>Neues Profil Bild</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="btn btn-primary top-buffer">
                </form>
            </div>
        </div>
    </div>
@endsection

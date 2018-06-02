@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 top-buffer">
                <h3 class="panel-heading">Deine Daten:</h3>
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
                    <p>Deine Hochschule ist {{ Auth::user()->hochschule }}</p>
                    <p>Deinen Account gibt es seit {{ Auth::user()->created_at }}</p>
                </div>
                <form action="{{ route('bearbeiten') }}">
                    <button class="btn btn-primary mr-2 mb-1">Bearbeiten</button>
                </form>
            </div>
            <div class="col-md-2 mx-auto top-buffer-mobile">
                <img src="/image/ProfilePics/{{Auth::user()->avatar}}"
                     style="width: 150px; height: 150px; border-radius: 50%">
            </div>
            <div class="col-md-2 mx-auto">
                <form enctype="multipart/form-data" action="/account" method="post">
                    <label class="top-buffer-mobile">Neues Profil Bild</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="btn btn-primary top-buffer">
                </form>
            </div>
        </div>
    </div>
@endsection

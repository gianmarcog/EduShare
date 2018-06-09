@extends('layouts.app')
@section('content')
    <form class="col-8 top-buffer mx-auto">
        <input id="search" class="form-control mr-sm-2" type="search" placeholder="Zum Suchen schreiben" name="search">
    </form>
    <div id="searchOutput" class="top-buffer"></div>

@endsection
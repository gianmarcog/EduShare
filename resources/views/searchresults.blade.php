@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="col-12 top-buffer mx-auto">
                    <input id="search" class="form-control mr-sm-2" type="search" placeholder="Zum Suchen schreiben"
                           name="search">
                    <label style="float: right">
                        <select id="filter">
                            <option>Alles</option>
                            <option>Hochschulen</option>
                            <option>Vorlesungen</option>
                            <option>Aktivitaeten</option>
                        </select>
                    </label>
                </form>
            </div>
        </div>
    </div>

    <div id="searchOutput" class="top-buffer"></div>

@endsection
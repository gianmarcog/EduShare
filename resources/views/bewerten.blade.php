@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <h1 class="top-buffer">Hallo {{Auth::user()->name}}!</h1>
                </div>
                <div class="row">
                    <h2>Du kannst folgendes bewerten: </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container top-buffer">
        <div class="row">
            <div class="col-12">
                <h3>Deine Hochschule</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th id="column">Name</th>
                        <th id="column">Standort</th>
                        <th id="column">Ranking</th>
                        <th id="column">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td id="column"> {{  $h->name }} </td>
                        <td id="column"> {{  $h->standort }}</td>
                        <td id="column"> {{  $h->ranking }}</td>
                        <td>
                            <form action="/hochschule/{{ $h->id }}">
                                <button type="submit" class="btn btn-primary btn-url">Informationen</button>
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Vorlesungen der {{$h->name}}</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th id="column">Name</th>
                        <th id="column">Professor</th>
                        <th id="column">Ranking</th>
                        <th id="detail">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($vs as $v)
                        <tr>
                            <td id="column"> {{  $v->name }}</td>
                            <td id="column"> {{  $v->professor }}</td>
                            <td id="column"> {{  $v->ranking }}</td>
                            <td>
                                <form action="/hochschule/{{ $h->hid }}">
                                    <button type="submit" class="btn btn-primary btn-url">Hochschule</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Aktivitäten</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th id="column">Aktivität</th>
                        <th id="column">Standort</th>
                        <th id="column">Ranking</th>
                        <th id="detail">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($as as $a)
                        <tr>
                            <td id="column"> {{  $a->name }} </td>
                            <td id="column"> {{  $a->standort }}</td>
                            <td id="column"> {{  $a->ranking }}</td>
                            <td>
                                <form action="/aktivitaet/{{ $h->id }}">
                                    <button type="submit" class="btn btn-primary btn-url">Informationen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
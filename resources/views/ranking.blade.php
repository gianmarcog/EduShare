@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Hochschulen</h3>
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
                    @foreach ($hs as $h)
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
                    @foreach ($a as $h)
                        <tr>
                            <td id="column"> {{  $h->name }} </td>
                            <td id="column"> {{  $h->standort }}</td>
                            <td id="column"> {{  $h->ranking }}</td>
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

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Vorlesungen</h3>
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
                    @foreach ($v as $h)
                        <tr>
                            <td id="column"> {{  $h->name }}</td>
                            <td id="column"> {{  $h->professor }}</td>
                            <td id="column"> {{  $h->ranking }}</td>
                            <td>
                                <form action="/vorlesung/{{ $h->id }}">
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
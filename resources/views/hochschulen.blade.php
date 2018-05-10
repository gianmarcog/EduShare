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
                        <th id="detail">&nbsp;</th>
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

@endsection
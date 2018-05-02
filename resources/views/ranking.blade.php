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
                    <th>Name</th>
                    <th>Standort</th>
                    <th>Ranking</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($hs as $h)
                    <tr>
                        <td> {{  $h->name }} </td>
                        <td> {{  $h->standort }}</td>
                        <td> {{  $h->ranking }}</td>
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
                        <th>Aktivität</th>
                        <th>Standort</th>
                        <th>Ranking</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($hs as $h)
                        <tr>
                            <td> {{  $h->aktivitaet }} </td>
                            <td> {{  $h->standort }}</td>
                            <td> {{  $h->ranking }}</td>
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
                        <th>Name</th>
                        <th>Professor</th>
                        <th>Ranking</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($hs as $h)
                        <tr>
                            <td> {{  $h->name }} </td>
                            <td> {{  $h->professor }}</td>
                            <td> {{  $h->ranking }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
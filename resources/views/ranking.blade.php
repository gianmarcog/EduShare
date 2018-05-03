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
                            <td style="width: 33%"> {{  $h->name }} </td>
                            <td style="width: 33%"> {{  $h->standort }}</td>
                            <td style="width: 33%"> {{  $h->ranking }}</td>
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
                    @foreach ($a as $h)
                        <tr>
                            <td style="width: 33%"> {{  $h->name }} </td>
                            <td style="width: 33%"> {{  $h->standort }}</td>
                            <td style="width: 33%"> {{  $h->ranking }}</td>
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
                    @foreach ($v as $h)
                        <tr>
                            <td style="width: 33%"> {{  $h->name }} </td>
                            <td style="width: 33%"> {{  $h->professor }}</td>
                            <td style="width: 33%"> {{  $h->ranking }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
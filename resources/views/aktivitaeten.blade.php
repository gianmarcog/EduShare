@extends('layouts.app')

@section('content')
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

@endsection
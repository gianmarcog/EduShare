@extends('layouts.app')

@section('content')
    <h1>Hochschulen</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Standort</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($hs as $h)
            <tr>
                <td> {{  $h->name }} </td>
                <td> {{  $h->standort }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
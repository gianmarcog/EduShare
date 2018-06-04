@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 ml-3">
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
                <form class="form-horizontal" method="POST" action="{{ route('bewerten') }}">
                    {{ csrf_field() }}
                    <table class="table">
                        <thead>
                        <tr>
                            <th id="column">Name</th>
                            <th id="column" class="notmobile">Standort</th>
                            <th id="column">Deine Bewertung</th>
                            <th id="column">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td id="column"> {{  $h->name }} </td>
                            <td id="column" class="notmobile"> {{  $h->standort }}</td>
                            <td id="bewertung"><input id="bewertungH" type="number" class="form-control"
                                                      name="bewertungH" value="{{ $h->ranking }}" required></td>
                            @if ($errors->has('bewertungH'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('bewertungH') }}</strong>
                                    </span>
                            @endif
                            <td>
                                <button type="submit" class="btn btn-primary">Bewerten</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Vorlesungen der {{$h->name}}</h3>
                <form class="form-horizontal" method="POST" action="{{ route('bewerten') }}">
                    {{ csrf_field() }}
                    <table class="table">
                        <thead>
                        <tr>
                            <th id="column">Name</th>
                            <th id="column" class="notmobile">Professor</th>
                            <th id="column">Deine Bewertung</th>
                            <th id="detail">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($vs as $v)
                            <tr>
                                <td id="column"> {{  $v->name }}</td>
                                <td id="column" class="notmobile"> {{  $v->professor }}</td>
                                <td id="bewertung"><input id="bewertungV" type="number" class="form-control"
                                                          name="bewertungV" value="{{ $h->ranking }}" required></td>
                                @if ($errors->has('bewertungV'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bewertungV') }}</strong>
                                    </span>
                                @endif
                                <td>
                                    <button type="submit" class="btn btn-primary">Bewerten</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                <h3>Aktivitäten</h3>
                <form class="form-horizontal" method="POST" action="{{ route('bewerten') }}">
                    {{ csrf_field() }}
                    <table class="table">
                        <thead>
                        <tr>
                            <th id="column">Aktivität</th>
                            <th id="column" class="notmobile">Standort</th>
                            <th id="column">Deine Bewertung</th>
                            <th id="detail">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($as as $a)
                            <tr>
                                <td id="column"> {{  $a->name }} </td>
                                <td id="column" class="notmobile"> {{  $a->standort }}</td>
                                <td id="bewertung"><input id="bewertungA" type="number" class="form-control"
                                                          name="bewertungA" value="{{ $h->ranking }}" required></td>
                                @if ($errors->has('bewertungA'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bewertungA') }}</strong>
                                    </span>
                                @endif
                                <td>
                                    <button type="submit" class="btn btn-primary">Bewerten</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
@endsection
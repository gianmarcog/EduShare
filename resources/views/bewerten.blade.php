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
                            <input type='hidden' name="name" value="{{  $h->name }}"/>
                            <td id="column" class="notmobile"> {{  $h->standort }}</td>
                            <td id="bewertung"><input id="bewertungH" type="number" class="form-control"
                                                      name="bewertung"
                                                      @if($bewertungHochschule->bewertung ==='nicht bewertet')
                                                      placeholder="{{ $bewertungHochschule->bewertung }}"
                                                      @else
                                                      value="{{ $bewertungHochschule->bewertung }}"
                                                      disabled
                                                      @endif
                                                      min="0" max="100"
                                                      required></td>
                            @if ($errors->has('bewertungH'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('bewertungH') }}</strong>
                                    </span>
                            @endif
                            <td>
                                <button type="submit" class="btn btn-primary"
                                        @if($bewertungHochschule->bewertung !=='nicht bewertet')
                                        disabled
                                        @endif
                                >Bewerten
                                </button>
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
                        <form id="formV{{$v->id}}" class="form-horizontal" method="POST"
                              action="{{ route('bewerten') }}"></form>
                        <input form="formV{{$v->id}}" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <tr>
                            <td id="column"> {{  $v->name }}</td>
                            <input form="formV{{$v->id}}" type='hidden' name="name" value="{{  $v->name }}"/>
                            <td id="column" class="notmobile"> {{  $v->professor }}</td>
                            <td id="bewertung"><input form="formV{{$v->id}}" id="bewertungV" type="number"
                                                      class="form-control"
                                                      name="bewertung"
                                                      @if (!empty($bewertungen))
                                                      @foreach ($bewertungen as $bewertung)
                                                      @if($bewertung->bezeichnung === $v->name)
                                                      value="{{ $bewertung->bewertung }}"
                                                      disabled
                                                      @else
                                                      placeholder="nicht bewertet"
                                                      @endif
                                                      @endforeach
                                                      @endif
                                                      placeholder="nicht bewertet"
                                                      min="0" max="100"
                                                      required>
                            </td>
                            @if ($errors->has('bewertungV'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('bewertungV') }}</strong>
                                    </span>
                            @endif
                            <td>
                                <input
                                        form="formV{{$v->id}}"
                                        @foreach ($bewertungen as $bewertung)
                                        @if($bewertung->bezeichnung === $v->name)
                                        disabled
                                        @endif
                                        @endforeach
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Bewerten"
                                >
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
                <h3>Aktivitäten in Konstanz</h3>
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
                        <form id="formA{{$a->id}}" class="form-horizontal" method="POST"
                              action="{{ route('bewerten') }}"></form>
                        <input form="formA{{$a->id}}" type="hidden" name="_token" value="{{ csrf_token() }}">
                        <tr>
                            <td id="column"> {{  $a->name }} </td>
                            <input form="formA{{$a->id}}" type='hidden' name="name" value="{{  $a->name }}"/>
                            <td id="column" class="notmobile"> {{  $a->standort }}</td>
                            <td id="bewertung"><input form="formA{{$a->id}}" id="bewertungA" type="number"
                                                      class="form-control"
                                                      name="bewertung"
                                                      @if (!empty($bewertungen))
                                                      @foreach ($bewertungen as $bewertung)
                                                      @if($bewertung->bezeichnung === $a->name)
                                                      value="{{ $bewertung->bewertung }}"
                                                      disabled
                                                      @else
                                                      placeholder="nicht bewertet"
                                                      @endif
                                                      @endforeach
                                                      @endif
                                                      placeholder="nicht bewertet"
                                                      min="0" max="100"
                                                      required>
                                @if ($errors->has('bewertungA'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bewertungA') }}</strong>
                                    </span>
                            @endif
                            <td>
                                <input
                                        form="formA{{$a->id}}"
                                        @foreach ($bewertungen as $bewertung)
                                        @if($bewertung->bezeichnung === $a->name)
                                        disabled
                                        @endif
                                        @endforeach
                                        type="submit"
                                        class="btn btn-primary"
                                        value="Bewerten"
                                >
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

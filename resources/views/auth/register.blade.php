@extends('layouts.app')
@include('layouts.form_errors')

@section('content')
    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="row top-buffer">
                    <h3 class="col-10 ml-2">Hier kannst du dir einen neuen Account erstellen: </h3>
                    <div class="col-md-6 top-buffer">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name"
                                       value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Adresse</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="hochschule" class="col-md-4 control-label">Hochschule</label>
                            <div class="col-md-6">
                                <select id="hochschule" class="form-control" name="hochschule"
                                        value="{{ old('hochschule') }}" required autofocus>
                                    @foreach($hs as $h)
                                        <option>{{$h->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('hochschule'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hochschule') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 top-buffer">

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Passwort</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"
                                       name="password"
                                       required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Passwort
                                bestätigen</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                        <h3>Derzeit erlauben wir keine neuen Accounts!</h3>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary"disabled>
                                    Registrieren
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </form>
        </div>
        <div class="row">
            <h5 class="col-12 top-buffer">Durch einen EduShare Account hast du viele Vorteile, unter anderem kannst du: </h5>
            <ul>
                <li>Deine Hochschule, Vorlesungen und Aktivitäten bewerten</li>
                <li>Forums Beiträge erstellen und lesen</li>
                <li>Dich mit anderen Studenten austauschen</li>
            </ul>
        </div>
    </div>

@endsection

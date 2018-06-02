@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 top-buffer">
                <h3 class="panel-heading">Bearbeiten:</h3>
            </div>
            <div class="col-md-8">
                <form class="form-horizontal" method="POST" action="{{ route('bearbeiten') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                        <select id="hochschule" class="form-control" name="hochschule" value="{{ old('hochschule') }}" required autofocus>
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

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
                </form>
            </div>
            <div class="col-md-2 mx-auto top-buffer-mobile">
                <img src="/image/ProfilePics/{{Auth::user()->avatar}}"
                     style="width: 150px; height: 150px; border-radius: 50%">
            </div>
            <div class="col-md-2 mx-auto">
                <form enctype="multipart/form-data" action="/account" method="post">
                    <label class="top-buffer-mobile">Neues Profil Bild</label>
                    <input type="file" name="avatar">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="submit" class="btn btn-primary top-buffer">
                </form>
            </div>
        </div>
    </div>
@endsection

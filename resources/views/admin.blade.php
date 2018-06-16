@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 top-buffer">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        Fehler wurden begangen
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {!!Session::get('message')!!}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <h1>Admin Interface: </h1>
                <h2 class="top-buffer">Nutzer: </h2>
                {!! Form::open(['action' => 'AdminController@bulk_updateUS', 'method' => "POST", "class"=>"form-inline"]) !!}
                <div class="form-group">
                    <label for="lead_status" class="mr-2">Für die ausgewählten Zeilen wird der</label>
                    {!! Form::select('bulk_name', $user_Spalten, [], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="lead_status" class="ml-2 mr-2">geändert zu: </label>
                    {!! Form::text('bulk_value', null, ['class' => 'form-control'])!!}
                </div>
                <button class="btn btn-primary ml-4">Speichern</button>
                <hr>
                <table class="table table-striped top-buffer">
                    @foreach($user as $u)
                        <tr>
                            <td><td width="10px"><input type="checkbox" name="ids_to_edit[]" value="{{$u->id}}" /></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="name" data-url="{{route('admin/updateUS', ['id'=>$u->id])}}" data-pk="{{$u->id}}" data-title="change" data-name="name">{{$u->name}}</p></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="value"  data-url="{{route('admin/updateUS', ['id'=>$u->id])}}" data-pk="{{$u->id}}" data-title="change" data-name="value">{{$u->email}}</p></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="date"  data-url="{{route('admin/updateUS', ['id'=>$u->id])}}" data-pk="{{$u->id}}" data-title="change" data-name="date">{{$u->hochschule}}</p></td>
                        </tr>
                    @endforeach
                </table>
                {!! Form::close() !!}


            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 class="top-buffer">Hochschulen: </h2>
                {!! Form::open(['action' => 'AdminController@bulk_updateHS', 'method' => "POST", "class"=>"form-inline"]) !!}
                <div class="form-group">
                    <label for="lead_status" class="mr-2">Für die ausgewählten Zeilen wird der</label>
                    {!! Form::select('bulk_name', $hochschule_Spalten, [], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="lead_status" class="ml-2 mr-2">geändert zu: </label>
                    {!! Form::text('bulk_value', null, ['class' => 'form-control'])!!}
                </div>
                <button class="btn btn-primary ml-4">Speichern</button>
                <hr>
                <table class="table table-striped top-buffer">
                    @foreach($hochschulen as $hochschule)
                        <tr>
                            <td><td width="10px"><input type="checkbox" name="ids_to_edit[]" value="{{$hochschule->id}}" /></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="name" data-url="{{route('admin/updateHS', ['id'=>$hochschule->id])}}" data-pk="{{$hochschule->id}}" data-title="change" data-name="name">{{$hochschule->name}}</p></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="value"  data-url="{{route('admin/updateHS', ['id'=>$hochschule->id])}}" data-pk="{{$hochschule->id}}" data-title="change" data-name="value">{{$hochschule->standort}}</p></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="date"  data-url="{{route('admin/updateHS', ['id'=>$hochschule->id])}}" data-pk="{{$hochschule->id}}" data-title="change" data-name="date">{{$hochschule->url}}</p></td>
                        </tr>
                    @endforeach
                </table>
                {!! Form::close() !!}


            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <h2 class="top-buffer">Aktivitäten: </h2>
                {!! Form::open(['action' => 'AdminController@bulk_updateAK', 'method' => "POST", "class"=>"form-inline"]) !!}
                <div class="form-group">
                    <label for="lead_status" class="mr-2">Für die ausgewählten Zeilen wird der</label>
                    {!! Form::select('bulk_name', $aktivitaeten_Spalten, [], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="lead_status" class="ml-2 mr-2">geändert zu: </label>
                    {!! Form::text('bulk_value', null, ['class' => 'form-control'])!!}
                </div>
                <button class="btn btn-primary ml-4">Speichern</button>
                <hr>
                <table class="table table-striped top-buffer">
                    @foreach($aktivitaeten as $aktivitaet)
                        <tr>
                            <td><td width="10px"><input type="checkbox" name="ids_to_edit[]" value="{{$aktivitaet->id}}" /></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="name" data-url="{{route('admin/updateAK', ['id'=>$aktivitaet->id])}}" data-pk="{{$aktivitaet->id}}" data-title="change" data-name="name">{{$aktivitaet->name}}</p></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="value"  data-url="{{route('admin/updateAK', ['id'=>$aktivitaet->id])}}" data-pk="{{$aktivitaet->id}}" data-title="change" data-name="value">{{$aktivitaet->standort}}</p></td>
                        </tr>
                    @endforeach
                </table>
                {!! Form::close() !!}


            </div>
        </div>

        <div class="row">
            <div class="col-md-12">

                <h2 class="top-buffer">Vorlesungen: </h2>
                {!! Form::open(['action' => 'AdminController@bulk_updateVL', 'method' => "POST", "class"=>"form-inline"]) !!}
                <div class="form-group">
                    <label for="lead_status" class="mr-2">Für die ausgewählten Zeilen wird der</label>
                    {!! Form::select('bulk_name', $vorlesungen_Spalten, [], ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    <label for="lead_status" class="ml-2 mr-2">geändert zu: </label>
                    {!! Form::text('bulk_value', null, ['class' => 'form-control'])!!}
                </div>
                <button class="btn btn-primary ml-4">Speichern</button>
                <hr>
                <table class="table table-striped top-buffer">
                    @foreach($vorlesungen as $vorlesung)
                        <tr>
                            <td><td width="10px"><input type="checkbox" name="ids_to_edit[]" value="{{$vorlesung->id}}" /></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="name" data-url="{{route('admin/updateVL', ['id'=>$vorlesung->id])}}" data-pk="{{$vorlesung->id}}" data-title="change" data-name="name">{{$vorlesung->name}}</p></td>
                            <td><p href="#" class="testEdit" data-type="text" data-column="value"  data-url="{{route('admin/updateVL', ['id'=>$vorlesung->id])}}" data-pk="{{$vorlesung->id}}" data-title="change" data-name="value">{{$vorlesung->professor}}</p></td>
                        </tr>
                    @endforeach
                </table>
                {!! Form::close() !!}


            </div>
        </div>


    </div>
@endsection
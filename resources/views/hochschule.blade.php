@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/image/hochschulen/{{$hochschule->id}}.jpg" class="mt-4 img-fluid">
        <div class="row">
            <div class="col-12">
                <p></p>
                <div class="row">
                    <div class="col-md-6">
                        <h1>{{$hochschule->name}}</h1>
                        <h4>Standort: {{$hochschule->standort}}</h4>
                        <p>{{$hochschule->text}}</p>
                    </div>
                    <div
                            class="ldBar label-center col-md-6"
                            style="width:auto;height:250px;margin:auto"
                            data-value="{{$hochschule->ranking}}"
                            data-preset="circle"
                            data-stroke="#004561"
                    ></div>
                </div>

            </div>
        </div>
        <hr>
        <h1 class="top-buffer">Angebotene Vorlesungen: </h1>
        <div class="row">
            <div class="col-12">
                <p></p>
                @foreach ($vs as $v)
                    <div class="row top-buffer">
                        <div class="col-md-6">
                            <h3>{{$v->name}}</h3>
                            <h4>Professor: {{$v->professor}}</h4>
                        </div>
                        <div
                                class="ldBar label-center col-md-6"
                                style="width:auto;height:250px;margin:auto"
                                data-value="{{$v->ranking}}"
                                data-preset="circle"
                                data-stroke="#004561"
                        ></div>
                    </div>
                @endforeach

                <div class="row top-buffer">
                    <div class="mx-auto">
                        <a href="{{$hochschule->url}}">Webseite</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
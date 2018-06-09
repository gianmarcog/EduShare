@extends('layouts.app')

@section('content')
    <div class="container">
        <img src="/image/aktivitaeten/{{$aktivitaet->id}}.jpg" class="mt-4 img-fluid">
        <div class="row">
            <div class="col-12">
                <p></p>
                    <div class="row">
                        <div class="col-md-6">
                            <h1>{{$aktivitaet->name}}</h1>
                            <h4>Standort: {{$aktivitaet->standort}}</h4>
                            <p>{{$aktivitaet->text}}</p>
                        </div>
                        <div
                                class="ldBar label-center col-md-6"
                                style="width:auto;height:250px;margin:auto"
                                data-value="{{$aktivitaet->ranking}}"
                                data-preset="circle"
                                data-stroke="#004561"
                        ></div>
                    </div>
                    <div class="row top-buffer">
                        <div class="mx-auto">
                            <a href="{{$aktivitaet->url}}">Webseite</a>
                        </div>
                    </div>
            </div>
        </div>
    </div>


@endsection
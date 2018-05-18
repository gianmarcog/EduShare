@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                @foreach ($hs as $h)
                    <div class="row">
                        <div class="col-md-6">
                            <h1>{{$h->name}}</h1>
                            <h4>Standort: {{$h->standort}}</h4>
                            <p>{{$h->text}}</p>
                        </div>
                        <div
                                class="ldBar label-center col-md-6"
                                style="width:auto;height:250px;margin:auto"
                                data-value="{{$h->ranking}}"
                                data-preset="circle"
                                data-stroke="#004561"
                        ></div>
                    </div>
                    <div class="row top-buffer">
                        <div class="mx-auto">
                            <a href="{{$h->url}}">Webseite</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@endsection
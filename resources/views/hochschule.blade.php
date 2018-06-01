@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p></p>
                @foreach ($hs as $h)
                    <?php $website = $h->url; ?>
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
                @endforeach

            </div>
        </div>
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
                        <a href=<?php echo $website?>>Webseite</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
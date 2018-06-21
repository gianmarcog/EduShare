@extends('layouts.app')

@section('content')
    @if($errors->any())
        <h4 class="text-center">{{$errors->first()}}</h4>
    @endif
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item carousel-item active">
                <a href="{{url('/hochschule/1')}}">
                    <img class="d-block img-fluid objectfit" src="/image/Htwg.jpg" alt="First slide">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h1>HTWG Konstanz</h1>
                    <h5>Studieren wo andere Urlaub machen</h5>
                </div>
            </div>
            <div class="item carousel-item">
                <a href="{{url('/aktivitaet/2')}}">
                    <img class="d-block img-fluid objectfit" src="/image/aktivitaeten/2.jpg" alt="Second slide">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h1>Fußballplatz Konstanz</h1>
                    <h5>Der Fußballplatz mitten in Konstanz. Der perfekte Ort um Turniere zu veranstalten und Tag und
                        Nacht Fußball zu spielen</h5>
                </div>
            </div>
            <div class="item carousel-item">
                <a href="{{url('/aktivitaet/3')}}">
                    <img class="d-block img-fluid objectfit" src="/image/Berrys.jpg" alt="Third slide">
                </a>
                <div class="carousel-caption d-none d-md-block">
                    <h1>Berry's Konstanz</h1>
                    <h5>Create your own story. Wir sind da, um deine Nächte unvergesslich zu machen.</h5>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div class="container text-center">
        <br>
        <h3>Was kannst du auf EduShare machen?</h3><br>
        <div class="row">
            <div class="col-sm-4">
                <a href="{{route('release')}}">
                    <img id="img100" src="/image/forum.jpg" class="img-responsive rounded" alt="Image">
                </a>
                <h4>Forum</h4>
                <div class="col-12">
                    <p>Wenn du Fragen hast kannst du sie hier deinen Kommilitonen stellen.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="{{route('aktivitaeten')}}">
                    <img id="img100" src="/image/basketball.jpg" class="img-responsive rounded" alt="Image">
                </a>
                <h4>Aktivitäten</h4>
                <div class="col-12">
                    <p>Finde eine Hochschule die dir deine Freizeitaktivitäten bietet.</p>
                </div>
            </div>
            <div class="col-sm-4">
                <a href="{{route('bewerten')}}">
                    <img id="img100" src="/image/bewertung.jpg" class="img-responsive rounded" alt="Image">
                </a>
                <h4>Bewerten</h4>
                <div class="col-12">
                    <p>Teile deine Erfahrungen mit einem Professor oder einer Vorlesung und bewerte sie!</p>
                </div>
            </div>
        </div>
    </div>
    <br>


@endsection


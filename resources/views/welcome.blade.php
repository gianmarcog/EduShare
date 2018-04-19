@extends('layouts.app')

@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block img-fluid objectfit" src="/image/Htwg.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
                <h1>HTWG Konstanz</h1>
                <h5>Studieren wo andere Urlaub machen</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block img-fluid objectfit" src="/image/Berrys.jpg" alt="Second slide">
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
            <img src="/image/forum.jpg" class="img-responsive rounded" style="width:100%" alt="Image">
            <h4>Forum</h4>
            <div class="col-12">
                <p>Wenn du Fragen hast kannst du sie hier deinen Kommilitonen stellen.</p>
            </div>
        </div>
        <div class="col-sm-4">
            <img src="/image/basketball.jpg" class="img-responsive rounded" style="width:100%" alt="Image">
            <h4>Aktivitäten</h4>
            <div class="col-12">
                <p>Hast du Lust auf eine Hochschule die dir deine Freizeitaktivitäten bietet?</p>
            </div>
        </div>
        <div class="col-sm-4">
            <img src="/image/bewertung.jpg" class="img-responsive rounded" style="width:100%" alt="Image">
            <h4>Bewerten</h4>
            <div class="col-12">
                <p>Teile deine Erfahrungen mit einem Professor oder einer Vorlesung und bewerte sie!</p>
            </div>
        </div>
    </div>
</div>
<br>

<footer class="page-footer font-small blue pt-4 mt-4">

    <div class="container-fluid text-center text-md-left ">
        <div class="row">

            <div class="col-md-6 mx-auto">
                <h5 class="text-uppercase">EduShare</h5>
                <p>Die EduShare Plattform ist ein Projekt von Gianmarco Giretti und René Borner für die Web-Tech
                    Vorlesung</p>
            </div>

            <div class="col-md-4 ">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="/Impressum/impressum.html">Impressum</a>
                    </li>
                    <li>
                        <a href="mailto:borner.rene@gmail.com">Kontakt</a>
                    </li>
                    <li>
                        <a href="/Rechtliches/rechtliches.html">Rechtliches</a>
                    </li>
                </ul>
                <label for="countries"></label><select name="countries" id="countries" style="width:150px;">
                    <option>Deutsch</option>
                </select>
            </div>
        </div>
        <div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div id="social" class="text-center center-block">
            <a href="https://www.facebook.com"><i class="fa fa-facebook-square fa-3x social"></i></a>
            <a href="https://twitter.com"><i class="fa fa-twitter-square fa-3x social"></i></a>
            <a href="https://plus.google.com"><i class="fa fa-google-plus-square fa-3x social"></i></a>
            <a href="mailto:marco.giretti9@gmail.com"><i class="fa fa-envelope-square fa-3x social"></i></a>
        </div>
    </div>
</footer>
@endsection


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>EduShare</title>
    <link rel="icon" href="/image/Logosmall.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- Styles -->
    <!--<link rel="stylesheet" href="/css/app.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/customcss.css">
</head>
<body>
<div id="app">
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('start') }}">
            <img src="/image/EduShare.png" width="70" height="60" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Übersicht <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Parking/Parking%20Page.html">Forum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('bewerten')}}">Bewerten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/Parking/Parking%20Page.html">Ranking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aktivitäten') }}">Aktivitäten</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Suchen" aria-label="Search">
            </form>
            <?php if (\Auth::check()) { ?>
            <button id="accountbutton" class="btn btn-primary dropdown">
                <p href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                   aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <sp    an class="caret"></span>
                </p>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </button>
            <?php } else { ?>
            <form action="{{ route('login') }}">
                <button class="btn btn-primary ml-2.desktop">Login</button>
            </form>
            <?php } ?>
        </div>
    </nav>

    @yield('content')
</div>

<!-- Scripts -->
<script src="/js/app.js"></script>
</body>
</html>

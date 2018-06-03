<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('uebersicht') }}">
        <img src="/image/EduShare.png" width="70" height="60" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'uebersicht') ? 'active' : '' }}"
                   href="{{route('uebersicht')}}">Übersicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'get_post') ? 'active' : '' }}"
                   href="{{route('get_post')}}">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'bewerten') ? 'active' : '' }}"
                   href="{{route('bewerten')}}">Bewerten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'ranking') ? 'active' : '' }}"
                   href="{{ route('ranking')}}">Ranking</a>
            </li>
            <li class="nav-item">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategorien
                    </a>
                    <div class="dropdown-menu">
                        <a class="ml-2 nav-link {{ (\Request::route()->getName() == 'aktivitaeten') ? 'active' : '' }}"
                           href="{{ route('aktivitaeten') }}">Aktivitäten</a>
                        <a class="ml-2 nav-link {{ (\Request::route()->getName() == 'hochschulen') ? 'active' : '' }}"
                           href="{{ route('hochschulen') }}">Hochschulen</a>
                    </div>
                </div>
            </li>
        </ul>

        <form action="{{ route('search') }}">
            <button class="btn btn-primary mr-2 mb-1">Suche</button>
        </form>

        @if (Auth::check())
            <button id="accountbutton" class="btn btn-primary dropdown mb-1 mr-2">
                <p href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                   aria-haspopup="true" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </p>

                <ul class="dropdown-menu">
                    <li>
                        <a href="{{route('account')}}" class="ml-2">Account</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="ml-2">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </button>
            <img src="/image/ProfilePics/{{Auth::user()->avatar}}"
                 style="width: 40px; height: 40px; border-radius: 50%">
        @else
            <form action="{{ route('login') }}">
                <button class="btn btn-primary ml-2.desktop mb-1">Login</button>
            </form>
        @endif
    </div>
</nav>
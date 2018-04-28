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
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'uebersicht') ? 'active' : '' }}" href="{{route('uebersicht')}}">Übersicht</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'forum') ? 'active' : '' }}" href="{{route('forum')}}">Forum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'bewerten') ? 'active' : '' }}" href="{{route('bewerten')}}">Bewerten</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'ranking') ? 'active' : '' }}" href="{{ route('ranking')}}">Ranking</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (\Request::route()->getName() == 'aktivitaeten') ? 'active' : '' }}" href="{{ route('aktivitaeten') }}">Aktivitäten</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Suchen" aria-label="Search">
        </form>
        <?php if (\Auth::check()) { ?>
        <button id="accountbutton" class="btn btn-primary dropdown">
            <p href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
               aria-haspopup="true" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
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
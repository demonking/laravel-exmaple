<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item ">
                            <a class="nav-link"
                               href="/">HOME <span class="sr-only"></span></a>
                        </li>
                        @if(Auth::user()->profile !== null)
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('profile.view',['profile' => auth()->user()->profile->id] ) }}">Profil
                                    <span class="sr-only"></span></a>
                            </li>
                        @else
                        @endif
                        <li class="nav-item">
                            <span class="nav-link fw-bold"> Sie sind als : {{auth()->user()->email}}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Ausloggen
                            </a>

                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

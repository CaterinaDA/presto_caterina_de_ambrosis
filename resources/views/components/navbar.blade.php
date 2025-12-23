<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Presto</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navPresto"
            aria-controls="navPresto" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navPresto">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                {{-- Index pubblico --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">
                        Annunci
                    </a>
                </li>

                {{-- Auth --}}
                @auth
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm fw-semibold" href="{{ route('articles.create') }}">
                            Inserisci annuncio
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Ciao, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Accedi</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

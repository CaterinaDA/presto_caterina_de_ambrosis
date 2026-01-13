{{-- Conteggio articoli da revisionare --}}
@php
    use App\Models\Article;
    $toBeRevised = Article::toBeRevisedCount();
@endphp


<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">Presto</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navPresto"
            aria-controls="navPresto" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navPresto">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                {{-- Search --}}
                <li class="nav-item">
                    <form class="d-flex" action="{{ route('articles.search') }}" method="GET">
                        <input class="form-control form-control-sm me-2" type="search" name="query"
                            placeholder="{{ __('ui.search_placeholder') }}" aria-label="Search">
                        <button class="btn btn-outline-warning btn-sm" type="submit">
                            {{ __('ui.search_button') }}
                        </button>
                    </form>
                </li>

                {{-- Index pubblico --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">
                        {{ __('ui.ads') }}
                    </a>
                </li>

                {{-- Dropdown categorie --}}
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{ __('ui.categories') }}
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        @forelse ($categories as $category)
                            <li>
                                <a class="dropdown-item" href="{{ route('article.byCategory', $category) }}">
                                    {{ __("ui.$category->name") }}
                                </a>
                            </li>

                            @if (!$loop->last)
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif
                        @empty
                            <li class="px-3 py-2 text-muted small">
                                {{ __('ui.no_categories') }}
                            </li>
                        @endforelse
                    </ul>
                </li>

                {{-- Selezione lingua --}}
                <li class="nav-item d-flex align-items-center gap-2 me-lg-2">
                    <x-_locale lang="it" />
                    <x-_locale lang="en" />
                    <x-_locale lang="es" />
                </li>

                {{-- Auth --}}
                @auth
                    <li class="nav-item">
                        <a class="btn btn-warning btn-sm fw-semibold" href="{{ route('articles.create') }}">
                            {{ __('ui.create_ad') }}
                        </a>
                    </li>

                    {{-- Area revisore --}}
                    @if (auth()->user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('revisor.index') }}">
                                {{ __('ui.revisor_area') }}
                                <span class="badge bg-warning text-dark ms-1">{{ $toBeRevised }}</span>
                            </a>
                        </li>
                    @endif

                    {{-- Dropdown utente --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.hello') }}, {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        {{ __('ui.logout') }}
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('ui.register') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>

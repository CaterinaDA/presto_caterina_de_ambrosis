<x-layout>
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Annunci</h2>

            @auth
                <a class="btn btn-warning fw-semibold" href="{{ route('articles.create') }}">
                    Inserisci annuncio
                </a>
            @endauth
        </div>

        @if ($articles->count() === 0)
            <div class="alert alert-info">
                Nessun annuncio pubblicato.
            </div>
        @else
            <div class="row g-4">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge text-bg-dark">
                                        {{ $article->category?->name ?? 'Senza categoria' }}
                                    </span>
                                    <span class="fw-bold">
                                        € {{ number_format($article->price, 2, ',', '.') }}
                                    </span>
                                </div>

                                <h5 class="card-title fw-bold">
                                    {{ $article->title }}
                                </h5>

                                <p class="card-text text-muted flex-grow-1">
                                    {{ \Illuminate\Support\Str::limit($article->description, 90) }}
                                </p>

                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        di {{ $article->user?->name ?? 'Anonimo' }}
                                    </small>

                                    @auth
                                        <a href="{{ route('articles.show', $article) }}"
                                            class="btn btn-outline-dark btn-sm">
                                            Dettaglio
                                        </a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                                            Accedi per vedere
                                        </a>
                                    @endauth
                                </div>

                            </div>
                            <div class="card-footer bg-white">
                                <small class="text-muted">
                                    Pubblicato: {{ $article->created_at->format('d/m/Y') }}
                                </small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        @endif
    </div>
</x-layout>

<div class="card h-100 shadow-sm card-w">
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

        <div class="d-flex justify-content-between align-items-center mt-auto">
            <small class="text-muted">
                di {{ $article->user?->name ?? 'Anonimo' }}
            </small>

            {{-- Auth --}}
            @auth
                @if ($article?->id)
                    <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-outline-dark btn-sm">
                        Dettaglio
                    </a>
                @else
                    <span class="text-muted small">Dettaglio non disponibile</span>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                    Accedi per leggere
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

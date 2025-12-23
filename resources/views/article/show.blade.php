<x-layout>
    <div class="container py-5">

        <a href="{{ route('articles.index') }}" class="btn btn-outline-dark btn-sm mb-4">
            Torna agli annunci
        </a>

        <div class="card shadow-sm">
            <div class="card-body p-4">

                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <span class="badge text-bg-dark">
                            {{ $article->category?->name ?? 'Senza categoria' }}
                        </span>

                        <div class="text-muted mt-2">
                            Pubblicato da <strong>{{ $article->user?->name ?? 'Anonimo' }}</strong>
                        </div>
                    </div>

                    <div class="fs-4 fw-bold">
                        € {{ number_format($article->price, 2, ',', '.') }}
                    </div>
                </div>

                <h1 class="h3 fw-bold mb-3">{{ $article->title }}</h1>

                <p class="mb-0" style="white-space: pre-line;">
                    {{ $article->description }}
                </p>

            </div>
        </div>

    </div>
</x-layout>

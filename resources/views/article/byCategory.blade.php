<x-layout>
    <div class="container py-5">

        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-2 mb-4">
            <div>
                <h2 class="mb-1">Categoria: {{ $category->name }}</h2>
                <p class="text-muted mb-0">
                    Annunci più recenti in questa categoria.
                </p>
            </div>

            <a href="{{ route('articles.index') }}" class="btn btn-outline-dark btn-sm">
                Torna a tutti gli annunci
            </a>
        </div>

        @if ($articles->count() === 0)
            <div class="alert alert-info">
                Nessun annuncio in questa categoria.
            </div>
        @else
            <div class="row g-4">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4">
                        <x-card :article="$article" />
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        @endif

    </div>
</x-layout>

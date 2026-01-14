@php use Illuminate\Support\Facades\Storage; @endphp

<x-layout>
    <div class="container py-5">

        <h1 class="mb-4">Dashboard Revisore</h1>

        {{-- Messaggio di accettazione/rifiuto --}}
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif


        @if ($article_to_check)
            <div class="card p-4 shadow-sm">
                <h3 class="mb-3">{{ $article_to_check->title }}</h3>

                {{-- Immagini --}}
                @if ($article_to_check->images->count() > 0)
                    <div class="row g-2 mb-3">
                        @foreach ($article_to_check->images as $image)
                            <div class="col-12 col-md-4">
                                <div class="revisor-image-box">
                                    <img src="{{ Storage::url($image->path) }}" loading="lazy" alt="Immagine articolo">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-secondary mb-3">
                        {{ __('ui.no_images') }}
                    </div>
                @endif

                <p class="mb-1"><strong>Prezzo:</strong> {{ $article_to_check->price }} €</p>
                <p class="mb-1"><strong>Categoria:</strong> {{ $article_to_check->category?->name }}</p>
                <p class="mb-3"><strong>Descrizione:</strong> {{ $article_to_check->description }}</p>

                {{-- Form accetta/rifiuta --}}
                <div class="d-flex gap-2">
                    <form method="POST" action="{{ route('revisor.accept', $article_to_check) }}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" type="submit">Accetta</button>
                    </form>

                    <form method="POST" action="{{ route('revisor.reject', $article_to_check) }}">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-danger" type="submit">Rifiuta</button>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-info">
                Nessun articolo da revisionare
            </div>

            <a href="{{ route('home') }}" class="btn btn-primary">Torna alla Home</a>
        @endif

    </div>
</x-layout>

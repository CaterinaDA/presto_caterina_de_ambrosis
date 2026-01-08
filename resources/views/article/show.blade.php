<x-layout>
    <div class="container py-5">

        <a href="{{ route('articles.index') }}" class="btn btn-outline-dark btn-sm mb-4">
            Torna agli annunci
        </a>

        <div class="card shadow-sm overflow-hidden">

            {{-- Carosello (3) --}}
            <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel">

                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#articleCarousel" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                {{-- 1 --}}
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <svg class="d-block w-100" viewBox="0 0 1200 500" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Foto segnaposto 1">
                            <rect width="1200" height="500" fill="#e9ecef"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#6c757d"
                                font-size="48" font-family="Arial, sans-serif">
                                Foto segnaposto 1
                            </text>
                        </svg>
                    </div>
                    {{-- 2 --}}
                    <div class="carousel-item">
                        <svg class="d-block w-100" viewBox="0 0 1200 500" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Foto segnaposto 2">
                            <rect width="1200" height="500" fill="#e9ecef"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#6c757d"
                                font-size="48" font-family="Arial, sans-serif">
                                Foto segnaposto 2
                            </text>
                        </svg>
                    </div>
                    {{-- 3 --}}
                    <div class="carousel-item">
                        <svg class="d-block w-100" viewBox="0 0 1200 500" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Foto segnaposto 3">
                            <rect width="1200" height="500" fill="#e9ecef"></rect>
                            <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#6c757d"
                                font-size="48" font-family="Arial, sans-serif">
                                Foto segnaposto 3
                            </text>
                        </svg>
                    </div>
                </div>

                <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Precedente</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Successivo</span>
                </button>
            </div>

            <div class="card-body p-4">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <span class="badge text-bg-dark">
                            {{ $article->category?->name ?? 'Senza categoria' }}
                        </span>

                        <div class="text-muted mt-2">
                            Pubblicato da <strong>{{ $article->user?->name ?? 'Anonimo' }}</strong>
                            <span class="mx-2">•</span>
                            il {{ $article->created_at->format('d/m/Y') }}
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

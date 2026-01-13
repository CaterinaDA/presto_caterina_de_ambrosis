<div class="card h-100 shadow-sm card-w">
    <div class="card-body d-flex flex-column">

        <div class="d-flex justify-content-between align-items-start mb-2">
            <span class="badge text-bg-dark">
                {{ $article->category ? __('ui.' . $article->category->name) : __('ui.no_category') }}
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
                {{ __('ui.by') }} {{ $article->user?->name ?? __('ui.anonymous') }}
            </small>

            {{-- Auth --}}
            @auth
                @if ($article?->id)
                    <a href="{{ route('articles.show', ['article' => $article->id]) }}" class="btn btn-outline-dark btn-sm">
                        {{ __('ui.details') }}
                    </a>
                @else
                    <span class="text-muted small">{{ __('ui.details_not_available') }}</span>
                @endif
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                    {{ __('ui.login_to_read') }}
                </a>
            @endauth

        </div>
    </div>

    <div class="card-footer bg-white">
        <small class="text-muted">
            {{ __('ui.published_at') }}: {{ $article->created_at->format('d/m/Y') }}
        </small>
    </div>
</div>

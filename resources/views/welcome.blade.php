<x-layout>
    {{-- Header --}}
    <header class="container my-5">
        <div class="p-5 hero-presto shadow">
            <h1 class="display-5 fw-bold mb-3">{{ __('ui.welcome_title') }}</h1>

            <p class="lead mb-4">
                {{ __('ui.welcome_subtitle') }}
            </p>

            {{-- Auth --}}
            @auth
                <a href="{{ route('articles.create') }}" class="btn btn-warning btn-lg fw-semibold">
                    {{ __('ui.create_ad') }}
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-light btn-lg fw-semibold me-2">
                    {{ __('ui.register') }}
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg fw-semibold">
                    {{ __('ui.login') }}
                </a>
            @endauth
        </div>
    </header>

    {{-- 3 card centrali --}}
    <section class="container pb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ __('ui.step_publish_title') }}</h5>
                        <p class="card-text text-muted mb-0">
                            {{ __('ui.step_publish_text') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ __('ui.step_category_title') }}</h5>
                        <p class="card-text text-muted mb-0">
                            {{ __('ui.step_category_text') }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ __('ui.step_done_title') }}</h5>
                        <p class="card-text text-muted mb-0">
                            {{ __('ui.step_done_text') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Ultimi annunci --}}
    <section class="container pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">{{ __('ui.latest_ads') }}</h2>

            <a href="{{ route('articles.index') }}" class="btn btn-outline-dark btn-sm">
                {{ __('ui.see_all') }}
            </a>
        </div>

        @if ($articles->count() === 0)
            <div class="alert alert-info">
                {{ __('ui.no_ads') }}
            </div>
        @else
            <div class="row g-4">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-6 col-lg-4">
                        <x-card :article="$article" />
                    </div>
                @endforeach
            </div>
        @endif
    </section>

</x-layout>

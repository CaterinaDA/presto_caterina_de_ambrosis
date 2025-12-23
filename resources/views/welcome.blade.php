<x-layout>
    <header class="container my-5">
        <div class="p-5 hero-presto shadow">
            <h1 class="display-5 fw-bold mb-3">Presto</h1>
            <p class="lead mb-4">
                Vendi quello che non usi più. Crea il tuo annuncio in pochi secondi.
            </p>

            @auth
                <a href="{{ route('articles.create') }}" class="btn btn-warning btn-lg fw-semibold">
                    Inserisci annuncio
                </a>
            @else
                <a href="{{ route('register') }}" class="btn btn-light btn-lg fw-semibold me-2">
                    Registrati
                </a>
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg fw-semibold">
                    Accedi
                </a>
            @endauth
        </div>
    </header>

    <section class="container pb-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Pubblica</h5>
                        <p class="card-text text-muted mb-0">
                            Inserisci titolo, descrizione e prezzo.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Scegli categoria</h5>
                        <p class="card-text text-muted mb-0">
                            Le categorie sono già pronte per te.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">Concludi</h5>
                        <p class="card-text text-muted mb-0">
                            Ricevi conferma dopo l’inserimento.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>

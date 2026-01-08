<x-layout>
    <div class="container py-5">
        <h2>Registrazione</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                Credenziali non valide.
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input class="form-control" type="text" name="name" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Conferma password</label>
                <input class="form-control" type="password" name="password_confirmation" required>
            </div>

            <button class="btn btn-dark">Registrati</button>
        </form>
    </div>
</x-layout>

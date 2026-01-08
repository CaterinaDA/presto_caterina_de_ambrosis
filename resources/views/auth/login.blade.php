<x-layout>

    <div class="container py-5">
        <h2>Login</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                Credenziali non valide.
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input class="form-control" type="email" name="email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>

            <button class="btn btn-dark">Accedi</button>
        </form>
    </div>
</x-layout>

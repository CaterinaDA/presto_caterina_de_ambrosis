<footer class="footer-presto mt-auto py-4">
    <div class="container text-center">

        <small class="text-muted d-block mb-2">
            © {{ date('Y') }} Presto
        </small>

        {{-- Richiesta revisore se Auth --}}
        @auth
            <form action="{{ route('become.revisor') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm">
                    Lavora con noi
                </button>
            </form>
        @endauth

    </div>
</footer>

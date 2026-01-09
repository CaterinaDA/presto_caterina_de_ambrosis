<!doctype html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Presto</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="d-flex flex-column min-vh-100">

    {{-- Navbar --}}
    <x-navbar />

    {{-- Main --}}
    <main class="flex-grow-1">

        <div class="container py-3">

            @if (session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

        </div>

        {{ $slot }}

    </main>

    {{-- Footer --}}
    <x-footer />

</body>

</html>

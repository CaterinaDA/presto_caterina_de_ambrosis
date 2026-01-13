@php
    $flags = [
        'it' => 'country-it',
        'en' => 'country-gb',
        'es' => 'country-es',
    ];

    $flag = $flags[$lang] ?? 'country-it';
@endphp

<form class="d-inline" action="{{ route('set_language', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="btn p-0 border-0 bg-transparent">
        <img src="{{ asset('vendor/blade-flags/' . $flag . '.svg') }}" width="32" height="32"
            alt="{{ $lang }}">
    </button>
</form>

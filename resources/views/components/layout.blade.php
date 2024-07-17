<!DOCTYPE html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="es-CO">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @isset($title)
        <title>Tareapp - {{ $title }}</title>
    @else
        <title>Tareapp</title>
    @endisset

    <meta name="description"
        content="{{ $metaDescription ?? 'Tareapp es una aplicacion que te permite llevar el control de tu dia a dia.' }}" />
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite('resources/css/app.css')
</head>

<body>
    <header class="px-4 py-2 border-b">
        @auth
            <a href="/">Tareas</a>
        @else
            <div class="flex space-x-2 items-center">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('signup') }}">Registro</a>
            </div>
        @endauth
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>

    </footer>
</body>

</html>

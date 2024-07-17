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
    <header class="border-b h-12">
        <div class="px-4 py-2 h-full container mx-auto">
            @auth
                <div class="flex justify-between items-center">
                    <a href="{{ route('tasks.list') }}">Tareas</a>

                    <div class="space-x-2 flex items-center">
                        <a href="#" class=""> @auth
                                {{ Auth::user()->name }}
                            @endauth </a>
                        <a href="{{ route('logout') }}" class="px-2 py-1 rounded-md bg-black text-white">Salir</a>
                    </div>
                </div>
            @else
                <div class="flex flex-row-reverse gap-2 items-center">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('signup') }}" class="px-2 py-1 rounded-lg bg-black text-white">Registro</a>
                </div>
            @endauth
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>

    </footer>
</body>

</html>

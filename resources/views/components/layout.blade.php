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

<body class="bg-neutral-200">
    <header class="h-12 max-h-12 bg-white border-b overflow-hidden shadow-lg">

        <div class="h-full w-full px-6 container mx-auto flex items-center justify-between">
            <div>
                <span class="font-semibold text-2xl">TareApp</span>
            </div>

            <div class="w-1/2">
                @auth

                    <div class="flex justify-between items-center">
                        <a href="{{ route('task.index') }}">Tareas</a>

                        <div class="space-x-2 flex items-center">
                            <a href="#" class=""> @auth
                                    {{ Auth::user()->name }}
                                @endauth </a>
                            <a href="{{ route('logout') }}" class="px-2 py-1 rounded-md bg-black text-white">Salir</a>
                        </div>
                    </div>
                @else
                    <div class="flex gap-2 items-center justify-end ">
                        <a href="{{ route('login') }}" class="px-2 py-1 rounded-lg border-[2px]">Login</a>
                        <a href="{{ route('signup') }}" class="px-2 py-1 rounded-lg bg-black text-white">Registro</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer>

    </footer>
</body>

</html>

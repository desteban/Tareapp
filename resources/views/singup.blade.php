<x-layout>
    <div class="max-w-lg mx-auto my-6 px-4 py-2 border rounded-lg shadow-md">
        <form class="border-b pb-3" action="{{ route('signup.store') }}" method="POST">
            @csrf
            <h1 class="mb-7 text-3xl font-semibold">Formulario</h1>

            <div class="mb-4">
                <label class="flex flex-col space-y-3">
                    Nombre
                    <input class="px-1 py-1 rounded-md border-[2px]" type="text" id="name" name="name"
                        placeholder="Nombre" value="{{ old('name') }}">
                </label>
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="flex flex-col space-y-3">
                    Correo
                    <input class="px-1 py-1 rounded-md border-[2px]" type="email" id="email" name="email"
                        placeholder="mail@mail.com" value="{{ old('email') }}">
                </label>
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label class="flex flex-col space-y-3">
                    Contraseña
                    <input class="px-1 py-1 rounded-md border-[2px]" type="password" name="password" id="password">
                </label>
                @error('password')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="bg-black text-white px-4 py-2 rounded-md w-full">Registrar</button>
        </form>

        <div class="mt-3">
            <a href="/">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</x-layout>

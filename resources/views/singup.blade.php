<x-layout>
    <div class="max-w-lg mx-auto my-6 px-4 py-2 border rounded-lg shadow-md">
        <form class="border-b pb-3" action="{{ route('signup.store') }}" method="POST">
            @csrf
            <h1 class="mb-7 text-3xl font-semibold">Formulario</h1>

            <x-input name="name" label="Nombre" placeholder="Nombre" value="{{ old('name') }}"
                required="{{ true }}">
                @error('name')
                    <x-error-input>{{ $message }}</x-error-input>
                @enderror
            </x-input>

            <x-input type="email" id="email" name="email" placeholder="mail@mail.com" label="Correo"
                value="{{ old('email') }}" required="{{ true }}">
                @error('email')
                    <x-error-input>{{ $message }}</x-error-input>
                @enderror
            </x-input>

            <x-input type="password" name="password" id="password" label="Contraseña" required="{{ true }}"
                value="{{ old('password') }}">
                @error('password')
                    <x-error-input>{{ $message }}</x-error-input>
                @enderror
            </x-input>

            <x-input type="password" name="confirmPassword" id="confirmPassword" label="Confirmar contraseña"
                required="{{ true }}">
                @error('confirmPassword')
                    <x-error-input>{{ $message }}</x-error-input>
                @enderror
            </x-input>

            <button type="submit" class="bg-black text-white px-4 py-2 rounded-md w-full">Registrar</button>
        </form>

        <div class="mt-3">
            <a href="/">¿Ya tienes cuenta? Inicia sesión</a>
        </div>
    </div>
</x-layout>

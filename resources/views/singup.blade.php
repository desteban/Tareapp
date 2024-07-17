<x-layout title="Signup">
    <div class="w-full mx-auto h-[calc(100svh-48px)] flex items-center justify-center">

        <div class="rounded-md border shadow-md px-5 py-3 w-[32rem]">
            @if (session('state'))
                <div class="px-5 py-2 rounded-lg bg-blue-300 shadow-md flex items-center space-x-5 my-3"><svg
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m16-40a8 8 0 0 1-8 8a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 8 8m-32-92a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                    </svg>
                    <p> {{ session('state') }}</p>
                </div>
            @endif

            @if (session('error'))
                <div class="px-5 py-2 rounded-lg bg-red-300 shadow-md flex items-center space-x-5 my-3"><svg
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m16-40a8 8 0 0 1-8 8a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 8 8m-32-92a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                    </svg>
                    <p> {{ session('state') }}</p>
                </div>
            @endif

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

                <x-button-solid type="submit">
                    Registrar
                </x-button-solid>
            </form>

            <div class="mt-3">
                <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
            </div>
        </div>

    </div>
</x-layout>

<x-layout title="{{ $task->title ?? '' }}">
    <article aria-label="Tarea {{ $task->title }}"
        class="w-full mx-auto h-[calc(100svh-48px)] flex items-center justify-center">

        <form
            class="px-5 py-3 rounded-md border shadow-md border-b "
            action="{{route('task.update', ['task' => $task->id])}}"
            method="POST"
            >
            @method('PUT')
            @csrf

            @isset($state)
                <div class="px-5 py-2 rounded-lg bg-blue-300 shadow-md flex gap-2 items-center my-5">
                    <div class="size-9">
                        <svg
                            xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m16-40a8 8 0 0 1-8 8a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 8 8m-32-92a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                        </svg>
                    </div>

                    <p class="m-0"> {{ $state }}</p>
                </div>
            @endisset

            <x-input
                id="tittle"
                name="title"
                placeholder="Titulo"
                label="Titulo"
                value="{{ old('title') ?? $task->title }}"
                >
                    @error('title')
                        <x-error-input>{{ $message }}</x-error-input>
                    @enderror
            </x-input>

            <div class="mb-4">
                <label>
                    Estado
                    <select id="status" name="status">
                        <option value="pendiente" @selected($task->status === 'pendiente')>Pendiente</option>
                        <option value="en progreso" @selected($task->status === 'en progreso')>En Proceso</option>
                        <option value="completado" @selected($task->status === 'completado')>Finalizado</option>
                    </select>
                </label>

                @error('status')
                    <x-error-input>{{ $message }}</x-error-input>
                @enderror
            </div>

            <div class="mb-4">
                <x-text-area
                    id="description"
                    name="description"
                    placeholder="Descripcion de la tarea"
                    label="Descripcion"
                    >
                        {{ old('description') ?? $task->description }}
                </x-text-area>

                @error('description')
                    <x-error-input>{{ $message }}</x-error-input>
                 @enderror
            </div>

            <x-button-solid type="submit">Actualizar</x-button-solid>

            <div class="mt-3">
                <a href="{{route('task.index')}}">Volver a las tareas.</a>
            </div>
        </form>
    </article>
</x-layout>

<x-layout title="{{ $task->title ?? '' }}">
    <article aria-label="Tarea {{ $task->title }}"
        class="w-full mx-auto h-[calc(100svh-48px)] flex items-center justify-center">

        <div class="px-5 py-3 rounded-md border shadow-md border-b bg-white">
            <form class="" action="{{ route('task.update', ['task' => $task->id]) }}" method="POST">
                @method('PUT')
                @csrf

                @isset($state)
                    <div class="px-5 py-2 rounded-lg bg-blue-300 shadow-md flex gap-2 items-center mt-5 mb-0 pb-0">
                        <div class="size-9">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m16-40a8 8 0 0 1-8 8a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 8 8m-32-92a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                            </svg>
                        </div>

                        <p class="m-0"> {{ $state }}</p>
                    </div>
                @endisset

                <x-input id="tittle" name="title" placeholder="Titulo" label="Titulo"
                    value="{{ old('title') ?? $task->title }}">
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
                    <x-text-area id="description" name="description" placeholder="Descripcion de la tarea"
                        label="Descripcion">
                        {{ old('description') ?? $task->description }}
                    </x-text-area>

                    @error('description')
                        <x-error-input>{{ $message }}</x-error-input>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="flex flex-col space-y-3">
                        Fecha limite
                        <input class="px-1 py-1 rounded-md border-[2px]" type="date" name="due_date" id="due_date"
                            min="{{ date('Y-m-d') }}" value="{{ old('due_date') ?? $task->due_date }}">
                    </label>

                    @error('due_date')
                        <x-error-input>{{ $message }}</x-error-input>
                    @enderror
                </div>

                <div class="flex space-x-1">
                    <x-button-solid type="submit">Actualizar</x-button-solid>
                </div>
            </form>

            <form class="mt-1" action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
                @method('DELETE')
                @csrf
                    <x-button-outline type="submit"
                        class="text-red-400 border-red-300 flex flex-row items-center space-x-2 justify-center">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" width="34" height="34"
                            viewBox="0 0 24 24">
                            <g fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M17 5V4a2 2 0 0 0-2-2H9a2 2 0 0 0-2 2v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V7h1a1 1 0 1 0 0-2zm-2-1H9v1h6zm2 3H7v11a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1z"
                                    clip-rule="evenodd" />
                                <path d="M9 9h2v8H9zm4 0h2v8h-2z" />
                            </g>
                        </svg>
                        <span>Eliminar</span>
                    </x-button-outline>
            </form>

            <div class="mt-3">
                <a href="{{ route('task.index') }}">Volver a las tareas.</a>
            </div>
        </div>
    </article>
</x-layout>

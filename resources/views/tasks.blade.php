<x-layout>
    <div class="container mx-auto my-6 px-5 py-3">
        <h1 class="text-3xl font-semibold">Tus tareas</h1>

        @session('state')
            <div class="px-5 py-2 rounded-lg bg-blue-300 shadow-md flex gap-2 items-center my-5">
                <div class="size-9">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor"
                            d="M128 24a104 104 0 1 0 104 104A104.11 104.11 0 0 0 128 24m0 192a88 88 0 1 1 88-88a88.1 88.1 0 0 1-88 88m16-40a8 8 0 0 1-8 8a16 16 0 0 1-16-16v-40a8 8 0 0 1 0-16a16 16 0 0 1 16 16v40a8 8 0 0 1 8 8m-32-92a12 12 0 1 1 12 12a12 12 0 0 1-12-12" />
                    </svg>
                </div>

                <p class="m-0"> {{ session('state') }}</p>
            </div>
        @endsession

        @isset($tasks)
            <div class="mt-6 flex flex-col gap-5 md:grid md:grid-cols-3 md:px-12" aria-label="Listado de tareas">

                <a href="{{ route('task.new') }}" title="Nueva tarea"
                    class="px-5 py-2 rounded-lg border bg-white shadow-md md:h-full hover:shadow-xl transition duration-200 hidden md:flex items-center justify-center">
                    <div class="">
                        <div class="flex items-center justify-center">
                            <svg class="size-12" xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                viewBox="0 0 512 512">
                                <path d="M448 224H288V64h-64v160H64v64h160v160h64V288h160z" fill="currentColor" />
                            </svg>
                        </div>
                        <p class="text-xl ">Crear tarea</p>
                    </div>
                </a>

                @foreach ($tasks as $task)
                    <a class="relative text-inherit" href="{{ route('task.show', ['task' => $task->id]) }}"
                        title="Tarea {{ $task->title }}">

                        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST"
                            class="p-1 size-7 rounded-full bg-slate-500 flex items-center justify-center absolute -right-3 -top-2">
                            @method('DELETE')
                            @csrf
                            <button type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 16">
                                    <path fill-rule="evenodd"
                                        d="M7.48 8l3.75 3.75l-1.48 1.48L6 9.48l-3.75 3.75l-1.48-1.48L4.52 8L.77 4.25l1.48-1.48L6 6.52l3.75-3.75l1.48 1.48L7.48 8z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </form>

                        <div
                            class="px-5 py-2 rounded-lg border bg-white shadow-md md:h-full hover:shadow-xl transition duration-200">
                            <div class="flex items-center mb-5">
                                <div class="w-2/3">
                                    <h2 class="text-xl font-semibold mb-3">{{ $task->title }}</h2>
                                    <div class="text-sm">
                                        <p class="m-0">Creado: <time class="text-gray-600"
                                                datetime="{{ $task->created_at }}">{{ date('Y-m-d', strtotime($task->created_at)) }}</time>
                                        </p>

                                        <p class="m-0">Fecha limite: <time class="text-gray-600"
                                                datetime="{{ $task->due_date }}">{{ $task->due_date }}</time></p>

                                        <p class="m-0">Estado: <span class="font-semibold">{{ $task->status }}</span>
                                        </p>
                                    </div>

                                </div>

                                <div class="w-1/3 flex items-center justify-center">
                                    <div class="size-10">
                                        @switch($task->status)
                                            @case('pendiente')
                                                <x-icons.stop></x-icons.stop>
                                            @break

                                            @case('en progreso')
                                                <x-icons.clock></x-icons.clock>
                                            @break

                                            @case('completado')
                                                <x-icons.succes></x-icons.succes>
                                            @break

                                            @default
                                                <x-icons.stop></x-icons.stop>
                                            @break
                                        @endswitch
                                    </div>
                                </div>
                            </div>


                            <div>
                                <p class="text-sm">{{ Str::limit($task->description, 100) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        @endisset

        <div class="mt-5 w-full mb-9">
            {{ $tasks->links() }}
        </div>

        <div class="fixed left-4 bottom-4 size-12 md:hidden rounded-full bg-neutral-800 p-2">
            <a href="{{ route('task.new') }}" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 512 512">
                    <path d="M448 224H288V64h-64v160H64v64h160v160h64V288h160z" fill="currentColor" />
                </svg>
            </a>
        </div>

    </div>
</x-layout>

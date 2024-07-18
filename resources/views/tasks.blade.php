<x-layout>
    <div class="container mx-auto my-6 px-5 py-3">
        <h1 class="text-3xl font-semibold">Tus tareas</h1>

        @isset($tasks)
            <div class="mt-6 flex flex-col gap-5 md:grid md:grid-cols-3 md:px-12" aria-label="Listado de tareas">

                <a href="{{ route('task.new') }}" title="Nueva tarea"
                    class="px-5 py-2 rounded-lg border bg-white shadow-md md:h-full hover:shadow-xl transition duration-200 hidden md:flex items-center justify-center">
                    <div class="">
                        <div class="flex items-center justify-center">
                            <svg class="size-12" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 512 512">
                                <path d="M448 224H288V64h-64v160H64v64h160v160h64V288h160z" fill="currentColor" />
                            </svg>
                        </div>
                        <p class="text-xl ">Crear tarea</p>
                    </div>
                </a>

                @foreach ($tasks as $task)
                    <a class="text-inherit" href="{{ route('task.show', ['task' => $task->id]) }}"
                        title="Tarea {{ $task->title }}">
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

                                        <p class="m-0">Estado: <span class="font-semibold">{{ $task->status }}</span></p>
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

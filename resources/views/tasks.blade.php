<x-layout>
    <div class="container mx-auto my-6 px-5 py-3">
        <h1 class="text-3xl font-semibold">Tus tareas</h1>

        @isset($tasks)
            <div class="mt-6 flex flex-col gap-5 md:grid md:grid-cols-3 md:px-12" aria-label="Listado de tareas">
                @foreach ($tasks as $task)
                    <a class="text-inherit" href="{{ route('task.show', ['task' => $task->id] ) }}">
                        <div class="px-5 py-2 rounded-lg border bg-white shadow-md md:h-full hover:shadow-xl transition duration-200">
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

            <div class="mt-5 w-full" >
                {{ $tasks->links() }}
            </div>

    </div>
</x-layout>

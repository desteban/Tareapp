<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $usuario = $request->user();
        $tasks = $usuario->tasks()->orderBy('created_at', 'desc')->paginate(10);

        // dd($tasks['currentPage']);

        return view('tasks', [
            'tasks' => $tasks,
            // 'current' => $tasks->currentPage
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|min:1',
            'description' => 'required|string',
            'status' => 'required|in:pendiente,en progreso,completado',
            'due_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value < now()->format('Y-m-d')) {
                        $fail('The date must be later than the current date');
                    }
                },
            ],
        ]);

        $validated['user_id'] = $request->user()->id;
        $task = Task::create($validated);
        return $task;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        if (empty($task)) {
            abort(404);
        }

        return view('task-show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255|min:1',
            'description' => 'required|string',
            'status' => 'required|in:pendiente,en progreso,completado',
            'due_date' => [
                'required',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    if ($value < now()->format('Y-m-d')) {
                        $fail('The date must be later than the current date');
                    }
                },
            ],
        ]);

        $userId = $request->user()->id;
        $task = Task::where('id', $id)->where('user_id', $userId)->first();

        $task->fill($validated);
        $task->save();

        return view('task-show', ['task' => $task,])->with('state', 'Tarea actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('task.index')->with('state','Tarea Eliminada');
    }
}

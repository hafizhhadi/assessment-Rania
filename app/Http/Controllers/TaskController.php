<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    public function create()
    {
        return view('task.create');
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => 'In-Process',
        ]);

        return to_route('home');
    }

    public function show(Task $task)
    {
        return view('task.show', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('home');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return to_route('home');
    }

    public function completeTask(Task $task)
    {
        $task->update([
            'status' => 'done',
        ]);

        return to_route('home');
    }
}

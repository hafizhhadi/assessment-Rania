<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create()
    {
        return view('task.create');
    }

    public function store(Request $request)
    {
        Task::create([
            'name' => $request->name,
            'description' => $request->name,
            'status' => 'Pending',
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

    public function delete()
    {

    }
}

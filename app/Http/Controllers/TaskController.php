<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Enums\TaskStatusEnum;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function create()
    {
        return view('task.create');
    }

    public function store(StoreTaskRequest $request)
    {
        Task::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('home');
    }

    public function show(Task $task)
    {
        $this->authorize('show', $task);

        return view('task.show', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('home');
    }

    public function delete(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return to_route('home');
    }

    public function completeTask(Task $task)
    {
        $task->update([
            'status' => TaskStatusEnum::Done,
        ]);

        return to_route('home');
    }

}

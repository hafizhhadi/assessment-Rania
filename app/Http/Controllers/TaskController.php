<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Enums\TaskStatusEnum;
use App\Notifications\TaskNotify;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Notification;

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

        return to_route('home')->with([
            'message' => __('messages.success'),
            'alert' => __('alerts.success'),
        ]);
    }

    public function show(Task $task)
    {
        $this->authorize('show', $task);

        return view('task.show', compact('task'));
    }

    public function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return to_route('home')->with([
            'message' => __('messages.update'),
            'alert' => __('alerts.update'),
        ]);
    }

    public function delete(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return to_route('home')->with([
            'message' => __('messages.delete'),
            'alert' => __('alerts.delete'),
        ]);
    }

    public function completeTask(Task $task)
    {
        $this->authorize('update', $task);

        $task->update([
            'status' => TaskStatusEnum::Done,
        ]);
        
        Notification::send($task->user, new TaskNotify($task));

        return to_route('home')->with([
            'message' => __('messages.complete'),
            'alert' => __('alerts.success'),
        ]);
    }

}

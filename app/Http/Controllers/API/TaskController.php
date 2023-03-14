<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\User;

class TaskController extends Controller
{
    public function index()
    {
        $users = User::with('tasks')->get();

        return response()->json([
            'message' => 'success',
            'data' => $users,
        ]);
    }

    public function store(StoreTaskRequest $request)
    {
        $task = Task::create([
            'user_id' => $request->userId,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'success',
            'data' => $task,
        ]);
    }
}

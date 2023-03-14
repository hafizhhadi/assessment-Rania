<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        if ($request->admin == 0 || !$request->admin) {
            return response()->json([
                'message' => 'You are not Admin'
            ]);
        }

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

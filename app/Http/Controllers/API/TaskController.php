<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
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
}

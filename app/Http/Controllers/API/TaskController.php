<?php

namespace App\Http\Controllers\API;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

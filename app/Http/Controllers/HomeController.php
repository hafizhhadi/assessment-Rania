<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Enums\TaskStatusEnum;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = auth()->user()->tasks()->latest()->paginate(5);
        $completedTasks = Task::ByUser(auth()->user()->id)->CompletedTask()->get();
        $inProgressTasks = Task::ByUser(auth()->user()->id)->InProgressTask()->get();

        return view('home', compact('tasks', 'completedTasks', 'inProgressTasks'));
    }
}

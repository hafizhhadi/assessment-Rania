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
        $tasks = Task::ByUser(auth()->user()->id)->latest()->paginate(5);
        $completedTasks = Task::CompletedTask()->get();
        $inProgressTasks = Task::InProgressTask()->get();

        return view('home', compact('tasks', 'completedTasks', 'inProgressTasks'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Enums\TaskStatusEnum;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks = Task::ByUser(Auth()->user()->id)->latest()->paginate(5);
        $completedTasks = Task::CompletedTask()->count();
        $inProgressTasks = Task::InProgressTask()->count();

        return view('home', compact('tasks', 'completedTasks', 'inProgressTasks'));
    }
}

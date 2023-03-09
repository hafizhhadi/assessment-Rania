<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Task
Route::get('/create', [TaskController::class, 'create'])->name('task.create');
Route::post('/store', [TaskController::class, 'store'])->name('task.store');
Route::get('/show/{task:uuid}', [TaskController::class, 'show'])->name('task.show');
Route::post('/update/{task:uuid}', [TaskController::class, 'update'])->name('task.update');
Route::get('/delete/{task:uuid}', [TaskController::class, 'delete'])->name('task.delete');
Route::get('/complete/{task:uuid}', [TaskController::class, 'completeTask'])->name('task.complete');
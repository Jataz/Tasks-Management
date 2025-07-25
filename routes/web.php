<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

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

Route::redirect('/', '/tasks');

Route::resource('tasks', TaskController::class);
Route::resource('projects', ProjectController::class);

#for drag-and-drop reordering
Route::post('tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', [TasksController::class, 'index'])->name('tasks.index');

// create a new task
Route::get('/create', [TasksController::class, 'create'])->name('tasks.create');


// store a new task
Route::post('/create', [TasksController::class, 'store'])->name('tasks.store');

// view a task
Route::get('/task/{id}', [TasksController::class, 'show'])->name('tasks.show');

// edit a task
Route::get('/task/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');

// update a task
Route::put('/task/{id}', [TasksController::class, 'update'])->name('tasks.update');

// delete a task
Route::delete('/task/{id}', [TasksController::class, 'destroy'])->name('tasks.destroy');

// update status
Route::put('/task/{id}/status', [TasksController::class, 'updateStatus'])->name('tasks.updatestatus');
<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::post('/search', [FrontController::class, 'search'])->name('search');
Route::get('/seltags/{id}', [FrontController::class, 'seltags'])->name('seltags');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{id}', [TasksController::class, 'show'])->name('tasks.show');
Route::get('/tasks/{id}/edit', [TasksController::class, 'edit'])->name('tasks.edit');
Route::patch('/tasks/{id}', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{id}', [TasksController::class, 'destroy'])->name('tasks.destroy');

Route::get('/tasks/{id}/deleteone', [TasksController::class, 'destroy'])->name('tasks.deleteone');


Route::get('/tags', [TagsController::class, 'index'])->name('tags.index');
Route::get('/tags/create', [TagsController::class, 'create'])->name('tags.create');
Route::post('/tags', [TagsController::class, 'store'])->name('tags.store');
Route::get('/tags/{id}', [TagsController::class, 'show'])->name('tags.show');
Route::get('/tags/{id}/edit', [TagsController::class, 'edit'])->name('tags.edit');
Route::patch('/tags/{id}', [TagsController::class, 'update'])->name('tags.update');
Route::delete('/tags/{id}', [TagsController::class, 'destroy'])->name('tags.destroy');

Route::get('/tags/{id}/deleteone', [TagsController::class, 'destroy'])->name('tags.deleteone');


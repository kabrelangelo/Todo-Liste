<?php

use App\Http\Controllers\TodosController;
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

Route::get('/', [TodosController::class, "liste"])->name("todo.list");
Route::post('/action/add', [TodosController::class, "saveTodo"])->name('todo.save');
Route::get('/action/done/{id}', [TodosController::class, "markAsDone"])->name('todo.done');
Route::get('/action/delete/{id}', [TodosController::class, "deleteTodo"])->name('todo.delete');
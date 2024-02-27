<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

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
Route::redirect('/', '/to-do');

Route::get('/login',[LoginController::class, 'index'] );

// Todo Routes
Route::get('/to-do', [TodoController::class, 'index'] )->name('todo.list');
Route::post('/to-do', [TodoController::class, 'store'] )->name('todo.store');
Route::get('/to-do/{id}', [TodoController::class,'edit'])->name('todo.edit');
Route::put('/to-do/{id}', [TodoController::class,'update'])->name('todo.update');
Route::delete('/to-do/{id}', [TodoController::class,'destroy'])->name('todo.destroy');

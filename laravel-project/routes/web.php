<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [TodoController::class, 'index'])->name('todo.index');
Route::get('/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
Route::get('/show/{id}', [TodoController::class, 'show'])->name('todo.show');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('todo.edit');
Route::put('/update/{id}', [TodoController::class, 'update'])->name('todo.update');
Route::delete('/destroy{id}', [TodoController::class, 'destroy'])->name('todo.destroy');
Route::put('/toggle/{id}', [TodoController::class, 'toggle'])->name('todo.toggle');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

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

Route::get('/', [ProjectController::class, 'index'])->name('home');

Route::prefix('/project')->name('project.')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('index');
    Route::get('/create', [ProjectController::class, 'create'])->name('create');
    Route::post('/store', [ProjectController::class, 'store'])->name('store');
    // kalau ada {} artinya data dinamis atau data dr db
    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [ProjectController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [ProjectController::class, 'destroy'])->name('destroy');
});

Route::prefix('/task/{project}')->name('task.')->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('index');
    Route::get('/create', [TaskController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [TaskController::class, 'edit'])->name('edit');
});
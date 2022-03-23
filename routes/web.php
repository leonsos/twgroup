<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');
    //users
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::post('users/save', [\App\Http\Controllers\UserController::class, 'save'])->name('users.save');
    Route::put('users/update/{user}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::get('users/delete/{users}', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
    //tasks
    Route::get('tasks', [\App\Http\Controllers\TaskController::class, 'index'])->name('tasks.index');
    Route::post('tasks/save', [\App\Http\Controllers\TaskController::class, 'save'])->name('tasks.save');
    Route::post('tasks/assign/', [\App\Http\Controllers\TaskController::class, 'assigTask'])->name('tasks.assigTask');
    Route::get('tasks/comments/{id}', [\App\Http\Controllers\TaskController::class, 'getMyComments'])->name('get.commnetsTask');
    //logs
    Route::get('logs',[\App\Http\Controllers\LogController::class, 'index'])->name('logs.index');
    //
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

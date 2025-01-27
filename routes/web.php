<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('signup', 'singup')->name('signup');
// Route::view('login', 'login')->name('login');
Route::get('login', [LoginController::class, 'loginView'])->name('login');

Route::post('signup', [LoginController::class, 'store'])->name('signup.store');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('login', [LoginController::class, 'login'])->name('login.init');
Route::view('task/new', 'task-new')->name('task.new');
Route::resource('task', TaskController::class)->middleware('auth')->except(['edit', 'create']);

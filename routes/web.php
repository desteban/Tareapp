<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('singup', function () {
    return View('singup');
})->name('signup');
Route::post('signup', [LoginController::class, 'store'])->name('signup.store');

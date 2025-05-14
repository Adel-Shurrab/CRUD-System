<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/', [UserController::class, 'register'])->name('register.post');
<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\RegisterController;

Route::get('/', [RegisterController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
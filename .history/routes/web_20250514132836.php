<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::view('/home', 'home')->name('home');

Route::get('/', [UserController::class, 'showRegistrationForm'])->name('register');

Route::post('/register', [UserController::class, 'register'])->name('register.post');

Route::post('/login', [UserController::class, ])
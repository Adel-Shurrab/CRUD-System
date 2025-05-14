<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\RegisterController;

Route::view('/', RegisterController::class, 'showRegistrationForm')->name('register');
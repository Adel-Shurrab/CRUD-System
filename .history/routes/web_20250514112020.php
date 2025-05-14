<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
})->name('register');

Route::post('/register', function())
<?php

use Illuminate\Support\Facades\Route;

Route::post('/', function () {
    return view('register');
})->name('register');
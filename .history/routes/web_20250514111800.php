<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('re');
})->name('home');
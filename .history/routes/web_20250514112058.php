<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('register');
})->name('register');

Route::post('/register', function() {
    redirect()->route('register')->with('success', 'Registration successful!');
})->name('register.post');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;



Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('register.post');
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.post');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Blog posts routes
Route::middleware('auth')->group(function () {
    Route::view('/', 'home')->name('home');
    Route::get('/create', [PostController::class, 'createPost'])->name('posts.create');
    Route::post('/', [PostController::class, 'storePost'])->name('posts.store');
    Route::get('/home/{post}', [PostController::class, 'showPost'])->name('posts.show');
    Route::get('/home/{post}/edit', [PostController::class, 'editPost'])->name('posts.edit');
    Route::put('/home/{post}', [PostController::class, 'updatePost'])->name('posts.update');
    Route::delete('/home/{post}', [PostController::class, 'deletePost'])->name('posts.delete');
});

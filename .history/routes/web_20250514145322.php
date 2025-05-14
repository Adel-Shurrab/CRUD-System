<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

Route::middleware('auth')->group(function () {
    Route::view('/', 'home')->name('home');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [UserController::class, 'register'])->name('register.post');
    Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [UserController::class, 'login'])->name('login.post');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Blog posts routes
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostController::class, 'createPost'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'storePost'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'showPost'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'editPost'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'updatePost'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'deletePost'])->name('posts.delete');
});

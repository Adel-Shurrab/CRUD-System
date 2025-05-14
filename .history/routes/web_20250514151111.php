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
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::post('/', [PostController::class, 'createPost'])->name('posts.store');

    Route::prefix('posts')->name('posts.')->group(function () {
        Route::get('/create', [PostController::class, 'createPost'])->name('create');
        Route::post('/', [PostController::class, 'storePost'])->name('store');
        Route::get('/{post}', [PostController::class, 'showPost'])->name('show');
        Route::get('/{post}/edit', [PostController::class, 'editPost'])->name('edit');
        Route::put('/{post}', [PostController::class, 'updatePost'])->name('update');
        Route::delete('/{post}', [PostController::class, 'deletePost'])->name('delete');
    });
});

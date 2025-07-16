<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


// Home routes 
Route::get('/', [FeedController::class, 'index'])->name('index');

// Login Rooutes
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::post('/login',    [LoginController::class, 'login'   ])->name('login');

// Public Posts route
Route::prefix('post')->group(function () {
    Route::get('/GetPosts', [FeedController::class, 'getPosts'])->name('post.getPost');
    Route::get('/{id}',     [FeedController::class, 'showPost'])->name('show.post');
});

Route::prefix('comments')->group(function () {
    Route::get('/{post_id}/get-comments', [FeedController::class, 'getThread'])->name('comments.getThread');
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::prefix('post')->group(function () {
        Route::post('/sendPost',       [FeedController::class, 'store'])->name('post.store');
        Route::post('/create-comment/{id}', [FeedController::class, 'createComment'])->name('post.store.comment');
        Route::post('/retweet', [FeedController::class, 'retweetPost'])->name('post.store.retweet');
    });

    
});
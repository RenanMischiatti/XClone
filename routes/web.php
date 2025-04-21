<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


// Home routes 
Route::get('/', [HomeController::class, 'index'])->name('index');

// Login Rooutes
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::post('/login',    [LoginController::class, 'login'   ])->name('login');


Route::middleware('auth')->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    
    Route::prefix('post')->group(function () {
        Route::post('/sendPost', [FeedController::class, 'store'])->name('post.store');
    });
    

});

Route::get('/post/GetPosts', [FeedController::class, 'getPosts'])->name('post.getPost');
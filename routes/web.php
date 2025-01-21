<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;


// Home routes 
Route::get('/', [HomeController::class, 'index'])->name('index');

// Login Rooutes
Route::post('/register', [LoginController::class, 'register'])->name('register');
Route::post('/login',    [LoginController::class, 'login'   ])->name('login');
Route::get('/logout',    [LoginController::class, 'logout'   ])->name('logout');

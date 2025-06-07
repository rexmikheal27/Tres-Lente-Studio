<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;

Route::middleware('guest.user')->group(function() {
    Route::get('/login', [AuthUserController::class, 'index'])->name('login.user');
    Route::post('/login', [AuthUserController::class, 'login'])->name('auth.user');
    Route::get('/register', [AuthUserController::class, 'create'])->name('create.user');
    Route::post('/register', [AuthUserController::class, 'register'])->name('register.user');
});

Route::middleware('auth.user')->group(function() {
    Route::get('/dashboard', function() {
        return view('admin.dashboard');
    })->name('dashboard');
    Route::post('/logout', [AuthUserController::class, 'logout'])->name('logout.user');
});

Route::get('/', function () {
    return view('welcome');
});
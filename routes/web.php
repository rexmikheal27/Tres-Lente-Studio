<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientInquiryController;

// Guest routes
Route::middleware('guest.user')->group(function() {
    Route::get('/admin/login', [AuthUserController::class, 'index'])->name('login.user');
    Route::post('/admin/login', [AuthUserController::class, 'login'])->name('auth.user');
    Route::get('/admin/register', [AuthUserController::class, 'create'])->name('create.user');
    Route::post('/admin/register', [AuthUserController::class, 'register'])->name('register.user');
});

// Auth routes
Route::middleware('auth.user')->group(function() {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/admin/logout', [AuthUserController::class, 'logout'])->name('logout.user');
    
    // Service Categories Management
    Route::get('/admin/service-management', [ServiceCategoryController::class, 'index'])->name('service-management');
    Route::post('/admin/service-categories', [ServiceCategoryController::class, 'store'])->name('service-categories.store');
    Route::put('/admin/service-categories/{id}', [ServiceCategoryController::class, 'update'])->name('service-categories.update');
    Route::delete('/admin/service-categories/{id}', [ServiceCategoryController::class, 'destroy'])->name('service-categories.destroy');
    
    // Client Management
    Route::get('/admin/client-management', [ClientController::class, 'index'])->name('client-management');
    Route::post('/admin/clients', [ClientController::class, 'store'])->name('clients.store');
    Route::put('/admin/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/admin/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

    // Client Inquiry Management
    Route::get('/admin/inquiry-management', [ClientInquiryController::class, 'index'])->name('inquiry-management');
    Route::put('/admin/inquiries/{id}', [ClientInquiryController::class, 'update'])->name('inquiries.update');
    Route::delete('/admin/inquiries/{id}', [ClientInquiryController::class, 'destroy'])->name('inquiries.destroy');
});

// Homepage and Contact routes
Route::get('/', [ContactController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
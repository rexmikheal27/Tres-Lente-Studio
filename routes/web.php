<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientInquiryController;
use App\Models\ServiceCategory;

/*
|--------------------------------------------------------------------------
| Guest Routes
|--------------------------------------------------------------------------
*/
Route::middleware('guest.user')->group(function() {
    Route::get('/admin/login', [AuthUserController::class, 'index'])->name('login.user');
    Route::post('/admin/login', [AuthUserController::class, 'login'])->name('auth.user');
    Route::get('/admin/register', [AuthUserController::class, 'create'])->name('create.user');
    Route::post('/admin/register', [AuthUserController::class, 'register'])->name('register.user');
});

/*
|--------------------------------------------------------------------------
| Admin Routes (Protected)
|--------------------------------------------------------------------------
*/
Route::middleware('auth.user')->prefix('admin')->group(function() {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthUserController::class, 'logout'])->name('logout.user');
    
    // Service Categories Management
    Route::get('/service-management', [ServiceCategoryController::class, 'index'])->name('service-management');
    Route::prefix('service-categories')->group(function() {
        Route::get('/create', [ServiceCategoryController::class, 'create'])->name('service-categories.create');
        Route::post('/', [ServiceCategoryController::class, 'store'])->name('service-categories.store');
        Route::get('/{id}/edit', [ServiceCategoryController::class, 'edit'])->name('service-categories.edit');
        Route::put('/{id}', [ServiceCategoryController::class, 'update'])->name('service-categories.update');
        Route::delete('/{id}', [ServiceCategoryController::class, 'destroy'])->name('service-categories.destroy');
    });
    
    // Client Management
    Route::get('/client-management', [ClientController::class, 'index'])->name('client-management');
    Route::prefix('clients')->group(function() {
        Route::get('/create', [ClientController::class, 'create'])->name('clients.create');
        Route::post('/', [ClientController::class, 'store'])->name('clients.store');
        Route::get('/{id}/edit', [ClientController::class, 'edit'])->name('clients.edit');
        Route::put('/{id}', [ClientController::class, 'update'])->name('clients.update');
        Route::delete('/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    });
    
    // Client Inquiry Management
    Route::get('/inquiry-management', [ClientInquiryController::class, 'index'])->name('inquiry-management');
    Route::prefix('inquiries')->group(function() {
        Route::get('/{id}/view', [ClientInquiryController::class, 'view'])->name('inquiries.view');
        Route::put('/{id}', [ClientInquiryController::class, 'update'])->name('inquiries.update');
        Route::delete('/{id}', [ClientInquiryController::class, 'destroy'])->name('inquiries.destroy');
    });
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
// Homepage with service categories
Route::get('/', function () {
    $serviceCategories = ServiceCategory::where('is_active', true)
        ->orderBy('sort_order')
        ->orderBy('name')
        ->get();
    return view('index', compact('serviceCategories'));
})->name('home');

// Static Pages
Route::view('/services', 'services')->name('services');
Route::view('/about-us', 'aboutus')->name('about');

// Contact Page & Form Submission
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
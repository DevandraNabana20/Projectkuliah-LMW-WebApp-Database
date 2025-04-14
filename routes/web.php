<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminProfileController;

Route::get('/', function () {
    return view('index');
});

// Public routes
Route::get('/detail', function () {
    return view('detail');
})->name('detail');

Route::get('/tatatertib', function () {
    return view('tatatertib');
})->name('tatatertib');

Route::get('/registrasi', [App\Http\Controllers\RegistrasiController::class, 'showRegistrationForm'])->name('registrasi');
Route::post('/registrasi', [App\Http\Controllers\RegistrasiController::class, 'processRegistration'])->name('process-registrasi');
Route::get('/berhasil-registrasi/{id}', [App\Http\Controllers\RegistrasiController::class, 'showSuccessPage'])->name('berhasil-registrasi');
Route::get('/download-bukti/{id}', [App\Http\Controllers\RegistrasiController::class, 'downloadPdf'])->name('download-bukti-registrasi');

Route::get('/check-date-availability/{date}', [App\Http\Controllers\RegistrasiController::class, 'checkDateAvailability']);

// Admin public routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
});

// Admin protected routes
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

    Route::get('/profile', function () {
        return view('admin.profile');
    })->name('profile');

    Route::put('/profile/update', [AdminProfileController::class, 'update'])->name('profile.update');

    // Complaint management routes - ORDER MATTERS!
    // Put specific routes before wildcard/parameter routes
    Route::get('/complaints/add', [ComplaintController::class, 'create'])->name('add-complaint');
    Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');

    // Then the routes with parameters
    Route::get('/complaints/{id}/edit', [ComplaintController::class, 'edit'])->name('complaints.edit');
    Route::put('/complaints/{id}', [ComplaintController::class, 'update'])->name('complaints.update');
    Route::delete('/complaints/{id}', [ComplaintController::class, 'destroy'])->name('complaints.destroy');
    Route::put('/complaints/{id}/status', [ComplaintController::class, 'updateStatus'])->name('complaints.update-status');
    Route::get('/complaints/{id}', [ComplaintController::class, 'show'])->name('complaints.show');

    // Main complaints listing
    Route::get('/complaints', [ComplaintController::class, 'index'])->name('complaints');
});

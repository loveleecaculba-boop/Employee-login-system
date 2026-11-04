<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasswordResetController;

Route::get('/', function () {
    return redirect('/login');
});

// Guest Routes
Route::middleware('guest')->group(function () {

    // Employee Registration
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register']);

    // Employee Login
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login']);

    // Admin Login
    Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])
        ->name('admin.login');

    Route::post('/admin/login', [AuthController::class, 'adminLogin']);

    // Forgot Password
    Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPassword'])
        ->name('password.request');

    Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])
        ->name('password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPassword'])
        ->name('password.reset');

    Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])
        ->name('password.update');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {

    // Employee Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Employee Profile
    Route::get('/profile', [ProfileController::class, 'show']);

    Route::put('/profile', [ProfileController::class, 'update']);

    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])
        ->name('profile.password.update');

    // Admin Panel
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('admin');

    // Admin Activity Logs
    Route::get('/admin/activity-logs', [AdminController::class, 'activityLogs'])
        ->middleware('admin')
        ->name('admin.activity-logs');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
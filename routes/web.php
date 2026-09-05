<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect('/login');
});

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
});

Route::middleware('auth')->group(function () {

    // Employee/User Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    // Profile
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);

    // Admin Panel
    Route::get('/admin', [AdminController::class, 'index'])
        ->middleware('admin');

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Rute Login API (POST /api/login)
Route::post('/login', [AuthController::class, 'login']);

// Rute yang dilindungi autentikasi API (memerlukan token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    // Mendapatkan data user yang sedang login (opsional, jika ada method user di controller)
    // Route::get('/user', [AuthController::class, 'user']);

    // Logout API (POST /api/logout)
    Route::post('/logout', [AuthController::class, 'logout']);

    // Tambahkan rute API lain yang memerlukan autentikasi di sini
});
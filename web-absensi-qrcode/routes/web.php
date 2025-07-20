<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController; 
use App\Http\Controllers\CourseController;
use App\Http\Controllers\QRcodeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController; // Penting: Pastikan AuthController diimport
// Menggunakan AuthController sesuai dengan web.php Anda
use App\Http\Controllers\Api\AuthControl;

// Halaman Login dan Logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post'); // Rute untuk menangani login

// Grup Route yang Dilindungi Autentikasi
Route::middleware(['auth'])->group(function () {
    // Dashboard & Halaman Utama
    Route::get('/', [MainController::class, 'index']);
    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Halaman Index QR Code
    Route::get('/qrcode', [QRcodeController::class, 'index'])->name('qrcode.index'); // Diperbaiki: Rute qrcode.index didefinisikan
    // QR Code Generate 
    Route::get('/qrcode/generate/{course}', [QRcodeController::class, 'generate'])->name('qrcode.generate');

    // Halaman Index Data Kehadiran
    Route::get('/data-kehadiran', [CourseController::class, 'index'])->name('data-kehadiran.index'); // Diperbaiki: Rute data-kehadiran.index didefinisikan

    // Fitur Data Kehadiran per Mata Kuliah
    Route::get('/attendances/{course}', [AttendanceController::class, 'editAttendanceByCourse'])->name('attendances.edit');
    Route::get('/attendances/by/{course}', [AttendanceController::class, 'showAttendanceByCourse'])->name('attendances.show');
    Route::post('/attendances/{attendance}/update-status', [AttendanceController::class, 'updateAttendanceStatus'])->name('attendances.update.status');
});


// Endpoint untuk proses scan QR Code
Route::post('/qrcode/scan/{code}', [AttendanceController::class, 'scanQRcode'])->name('qrcode.scan');
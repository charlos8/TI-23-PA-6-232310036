<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRcodeController extends Controller
{
    /**
     * Menampilkan daftar mata kuliah untuk halaman QR Code Index (Rute qrcode.index).
     */
    public function index()
    {
        $courses = Course::all();
        // Menggunakan 'data-kehadiran.index'
        return view('qrcode', compact('courses')); 
    }

    /**
     * Menghasilkan dan menampilkan QR code untuk mata kuliah tertentu.
     */
    public function generate(Course $course)
    {
        $qrData = route('qrcode.scan', ['code' => $course->code]);
        $qrCode = QrCode::size(300)->generate($qrData);

        // Menggunakan 'qrcode-display'
        return view('qrcode-display', compact('course', 'qrCode'));
    }
}
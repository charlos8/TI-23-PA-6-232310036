<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    // Menampilkan daftar semua mata kuliah untuk halaman Data Kehadiran
    public function index()
    {
        $courses = Course::all();
        // Menggunakan 'data-kehadiran.index'
        return view('data-kehadiran.index', compact('courses'));
    }
}
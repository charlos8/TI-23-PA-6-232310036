@extends('layouts.app') 

@section('content')
    <div class="container">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang, {{ Auth::user()->name }}!</p>

        @if(session('success'))
            <div style="color: green; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <hr>

        <h2>Navigasi Cepat</h2>
        <div class="card-container">
            <div class="card">
                <h4>QR Code Absensi</h4>
                <p>Hasilkan QR Code untuk setiap mata kuliah.</p>
                <a href="{{ route('qrcode.index') }}" class="btn">Buat QR Code</a>
            </div>
            
            <div class="card">
                <h4>Data Kehadiran</h4>
                <p>Lihat dan kelola data kehadiran per mata kuliah.</p>
                <a href="{{ route('data-kehadiran.index') }}" class="btn">Lihat Data</a>
            </div>

            <div class="card">
                <h4>Manajemen Mahasiswa</h4>
                <p>Kelola data mahasiswa (tambah, edit, hapus).</p>
                <p>Akan datang</p>
            </div>
        </div>
        
        <hr>
        
        <h2>Daftar Mata Kuliah</h2>
        <div class="card-container">
            @foreach($courses as $course)
                <div class="card">
                    <h4>{{ $course->name }}</h4>
                    <p>Dosen: {{ $course->lecturer }}</p>
                    <p>Kode MK: {{ $course->course_code }}</p>
                    <a href="{{ route('data-kehadiran.index', $course->id) }}" class="btn">Lihat Data Kehadiran</a>
                    <!-- <a href="{{ route('qrcode.generate', $course->id) }}" class="btn btn-success">Generate QR Code</a> -->
                </div>
            @endforeach
        </div>
    </div>
@endsection
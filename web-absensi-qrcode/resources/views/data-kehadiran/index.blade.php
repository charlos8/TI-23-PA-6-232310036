@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <h2>Pilih Mata Kuliah untuk QR Code</h2>
    {{-- Breadcrumb --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('data-kehadiran.index') }}">Data Kehadiran</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pilih Mata Kuliah</li>
        </ol>
    </nav>

    <div class="row mt-4">
        {{-- Loop untuk menampilkan kartu setiap mata kuliah --}}
        @forelse ($courses as $course)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card card-custom h-100">
                <div class="card-header card-header-custom">
                    {{ $course->name }}
                </div>
                <div class="card-body d-flex flex-column justify-content-between">
                    <p class="card-text">Dosen: {{ $course->lecturer }}</p>
                    {{-- Tombol yang akan mengarahkan ke halaman QR Code spesifik untuk mata kuliah ini --}}
                    <a href="{{ route('attendances.show', $course->id) }}" class="btn btn-purple mt-auto">Tampilkan Kehadiran</a>
                </div>
            </div>
        </div>
        @empty
        {{-- Pesan jika tidak ada mata kuliah --}}
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                Belum ada mata kuliah yang terdaftar. Silakan tambahkan mata kuliah terlebih dahulu.
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
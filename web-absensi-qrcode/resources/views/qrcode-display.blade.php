@extends('layouts.app')

@section('content')
    <div class="container" style="text-align: center;">
        <h1>QR Code Presensi</h1>
        <h2>Mata Kuliah: {{ $course->name }}</h2>
        <p>Dosen: {{ $course->lecturer }}</p>
        <p>Kode Unik: <strong>{{ $course->code }}</strong></p>

        <div class="qr-code" style="margin: 30px auto; border: 2px solid #ddd; padding: 20px; border-radius: 10px; display: inline-block;">
            <div class="card" style="width: 18rem;">
            {!! $qrCode !!}
            <div class="card-body d-flex justify-content-between g-4">
                <a href="{{ route('dashboard') }}" class="btn btn-danger">Kembali</a>
                <a href="{{ route('attendances.edit', $course->id) }}" class="btn btn-success">Data Kehadiran</a>
            </div>
        </div>
        </div>

    </div>
@endsection
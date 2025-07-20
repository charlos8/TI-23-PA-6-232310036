@extends('layouts.app')

@section('content')
<div class="container-fluid mt-5">
    <h2>Konfirmasi Logout</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Logout</li>
        </ol>
    </nav>

    <div class="card card-custom mx-auto mt-4" style="max-width: 500px;">
        <div class="card-body text-center">
            <h4 class="card-title mb-4">Anda yakin ingin logout?</h4>
            <p class="card-text">Sesi Anda akan diakhiri dan Anda akan kembali ke halaman login.</p>
            <div class="d-flex justify-content-center gap-3 mt-4">
                <a href="{{ URL::previous() }}" class="btn btn-secondary px-4">Batal</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger px-4">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
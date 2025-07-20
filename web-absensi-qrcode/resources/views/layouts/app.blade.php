<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DataKehadiran') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Font Awesome untuk ikon-ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- CDN for qrcodejs --}}
    {{-- Ini adalah cara paling efektif untuk memuat qrcodejs setelah masalah import module --}}
    {{-- CDN for qrcodejs (tanpa integrity untuk mengatasi blocking) --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" referrerpolicy="no-referrer"></script>

    <!-- Vite CSS & JS -->
    {{-- Pastikan resources/sass/app.scss dan resources/js/app.js ada --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        {{-- Navbar Bagian Atas --}}
        <nav class="navbar navbar-expand-md navbar-custom shadow-sm fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/dashboard') }}">
                    {{-- Logo IBIK --}}
                    {{-- Pastikan 'logo-ibik.png' ada di public/images/ --}}
                    <img src="{{ asset('images/logo-ibik.png') }}" alt="Logo IBIK" style="height: 30px; margin-right: 10px;">
                    Web Absensi QR Code
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Sisi Kiri Navbar (bisa untuk Search, dll.) -->
                    <ul class="navbar-nav me-auto">
                        {{-- Search Bar (Opsional, Anda bisa aktifkan jika diperlukan) --}}
                        {{-- <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-light" type="submit">Search</button>
                        </form> --}}
                    </ul>

                    <!-- Sisi Kanan Navbar (User Info & Logout) -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">
                                        Profile
                                    </a>
                                    {{-- Link Logout di Dropdown Navbar --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- Sidebar Navigasi --}}
        {{-- Hanya tampilkan sidebar jika user sudah login --}}
        <div class="sidebar d-none d-md-block"> {{-- d-none d-md-block: Sembunyikan di mobile, tampilkan di medium ke atas --}}
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('qrcode.*') ? 'active' : '' }}" href="{{ route('qrcode.index') }}">
                        <i class="fas fa-qrcode"></i> QR Code
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('data-kehadiran.*') ? 'active' : '' }}" href="{{ route('data-kehadiran.index') }}">
                        <i class="fas fa-clipboard-list"></i> Data Kehadiran
                    </a>
                </li>
                {{-- Contoh link untuk manajemen mahasiswa (Anda perlu membuat controller dan viewnya jika ingin mengaktifkan ini) --}}
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                        <i class="fas fa-users"></i> Manajemen Mahasiswa
                    </a>
                </li> --}}
                <li class="nav-item">
                    {{-- Link Logout di Sidebar --}}
                    <a class="nav-link" href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>

        {{-- Konten Utama Halaman --}}
        {{-- margin-top (mt-5) untuk offset dari fixed navbar, margin-left (content) untuk offset dari sidebar --}}
        <main class="py-4 mt-5 content">
            {{-- Bagian ini akan diisi oleh konten dari setiap view Blade lainnya (misal dashboard.blade.php) --}}
            @yield('content')
        </main>
    </div>
</body>
</html>
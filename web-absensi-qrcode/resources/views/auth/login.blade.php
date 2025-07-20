<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Absensi QR Code</title>
    @vite(['resources/sass/app.scss']) {{-- Hanya CSS untuk halaman login --}}
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #6a0dad; /* Warna ungu */
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        .login-header {
            margin-bottom: 25px;
        }
        .login-header img {
            max-width: 150px; /* Sesuaikan ukuran logo */
            height: auto;
            margin-bottom: 15px;
        }
        .login-header h3 {
            color: #333;
            margin-bottom: 0;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
        }
        .btn-login {
            background-color: #6a0dad; /* Warna ungu */
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1em;
        }
        .btn-login:hover {
            background-color: #8a2be2; /* Warna ungu lebih terang saat hover */
        }
        .form-check {
            text-align: left;
            margin-bottom: 15px;
        }
        .form-check-input:checked {
            background-color: #6a0dad;
            border-color: #6a0dad;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            {{-- Logo IBIK --}}
            <img src="{{ asset('images/logo-ibik.png') }}" alt="Logo IBIK">
            <h3>Login Admin</h3>
        </div>
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <input type="email" name="email" class="form-control" placeholder="Email address" required autofocus value="{{ old('email') }}">
            @error('email')
                <div class="text-danger mb-3" style="font-size: 0.85em;">{{ $message }}</div>
            @enderror

            <input type="password" name="password" class="form-control" placeholder="Password" required>
            @error('password')
                <div class="text-danger mb-3" style="font-size: 0.85em;">{{ $message }}</div>
            @enderror

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    Remember me
                </label>
            </div>

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>
</body>
</html>
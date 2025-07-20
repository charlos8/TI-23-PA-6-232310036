<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Penting: Pastikan Auth facade diimport

class AuthController extends Controller
{
    /**
     * Menampilkan formulir login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Mengarahkan ke resources/views/auth/login.blade.php
    }

    /**
     * Menangani proses login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard'); // Arahkan ke dashboard setelah login sukses
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Menangani proses logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Melakukan proses logout dari session Laravel

        $request->session()->invalidate(); // Invalidasi sesi saat ini

        $request->session()->regenerateToken(); // Regenerate token CSRF untuk mencegah session fixation

        return redirect('/'); // Arahkan kembali ke halaman login setelah logout
    }
}
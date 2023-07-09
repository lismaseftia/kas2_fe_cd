<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form register
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Menangani submit form register
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        // Membuat pengguna baru
        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Melakukan login setelah registrasi
        Auth::login($user);

        // Redirect ke halaman setelah login
        return redirect('/dashboard');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Menangani submit form login
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Melakukan otentikasi pengguna
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil, redirect ke halaman setelah login
            return redirect('/dashboard');
        } else {
            // Jika otentikasi gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors([
                'email' => 'Invalid credentials',
            ]);
        }
    }
}

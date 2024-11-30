<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Method untuk menampilkan form login
    public function showFormLogin()
    {
        return view('auth.login');
    }

    // Method untuk menangani proses login
    public function login(Request $request)
    {
        // Validasi request
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Lakukan proses login
        if (auth()->attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // Jika gagal, kembali ke halaman login
        return back()->with('error', 'Email atau password salah!');
    }

    // Method untuk logout
        public function logout()
        {
            auth()->logout();
            request()->session()->invalidate();
            request()->session()->regenerateToken();
            return redirect('/login');
        }

}

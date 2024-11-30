<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Method untuk login
    public function login(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $validatedData['email'])->first();

        if ($user && Hash::check($validatedData['password'], $user->password)) {
            // Generate token
            $token = $user->createToken('YourAppName')->plainTextToken;

            // Kirimkan token dalam response
            return response()->json([
                'message' => 'Login berhasil',
                'token' => $token
            ], 200);
        }

        return response()->json([
            'message' => 'Email atau password salah'
        ], 401);
    }

    // Method untuk logout
    public function logout(Request $request)
    {
        // Hapus semua token yang dimiliki user
        $request->user()->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json([
            'message' => 'Logout berhasil'
        ], 200);
    }
}

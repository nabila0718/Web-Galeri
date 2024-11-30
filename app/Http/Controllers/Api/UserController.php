<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all(); // Mengambil semua data pengguna
        return response()->json($users, 200); // Mengembalikan data pengguna dalam format JSON
    }

    // Menampilkan detail pengguna berdasarkan ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        return response()->json($user, 200); // Mengembalikan data pengguna dalam format JSON
    }

    // Menambahkan pengguna baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Mengembalikan respons sukses
        return response()->json([
            'message' => 'User berhasil ditambahkan',
            'data' => $user
        ], 201);
    }

    // Mengupdate data pengguna berdasarkan ID
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
        ]);

        // Mengupdate pengguna
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Hanya memperbarui password jika ada input baru
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $user->password = bcrypt($request->password);
        }

        // Mengembalikan respons sukses
        return response()->json([
            'message' => 'User berhasil diupdate',
            'data' => $user
        ], 200);
    }

    // Menghapus pengguna berdasarkan ID
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        // Menghapus pengguna
        $user->delete();

        return response()->json([
            'message' => 'User berhasil dihapus'
        ], 200);
    }
}

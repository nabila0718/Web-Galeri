<?php

namespace App\Http\Controllers\Api;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    // Menampilkan semua gambar
    public function index()
    {
        $images = Image::all(); // Ambil semua data gambar
        return response()->json($images, 200); // Mengembalikan gambar dalam format JSON
    }

    // Menambahkan gambar baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            'title' => 'required',
        ]);

        // Menangani file yang diunggah
        $file = $request->file('file');
        $fileName = time() . '-' . $file->extension();
        $file->move(public_path('images'), $fileName);

        // Simpan gambar ke database
        $image = Image::create([
            'gallery_id' => $request->gallery_id,
            'file' => $fileName,
            'title' => $request->title,
        ]);

        // Mengembalikan respons sukses dalam format JSON
        return response()->json([
            'message' => 'Foto berhasil ditambahkan',
            'data' => $image
        ], 201);
    }

    // Menghapus gambar
    public function destroy($id)
    {
        $image = Image::find($id);

        if (!$image) {
            return response()->json([
                'message' => 'Gambar tidak ditemukan'
            ], 404);
        }

        // Hapus file gambar dari direktori
        unlink(public_path('images/' . $image->file));

        // Hapus data gambar dari database
        $image->delete();

        return response()->json([
            'message' => 'Foto berhasil dihapus'
        ], 200);
    }
}

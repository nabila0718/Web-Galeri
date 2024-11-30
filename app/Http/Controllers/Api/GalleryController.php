<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    // Menampilkan semua galeri dengan relasi post
    public function index()
    {
        $galleries = Gallery::with('post')->get();
        return response()->json($galleries, 200);
    }

    // Menampilkan galeri tertentu berdasarkan ID
    public function show($id)
    {
        $gallery = Gallery::with('post')->find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Galeri tidak ditemukan'], 404);
        }

        return response()->json($gallery, 200);
    }

    // Menambahkan galeri foto baru
    public function store(Request $request)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|string',
        ]);

        $gallery = Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Galeri foto berhasil ditambahkan',
            'data' => $gallery
        ], 201);
    }

    // Memperbarui galeri foto
    public function update(Request $request, $id)
    {
        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'position' => 'required|integer',
            'status' => 'required|string',
        ]);

        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Galeri tidak ditemukan'], 404);
        }

        $gallery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'Galeri foto berhasil diperbarui',
            'data' => $gallery
        ], 200);
    }

    // Menghapus galeri foto
    public function destroy($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            return response()->json(['message' => 'Galeri tidak ditemukan'], 404);
        }

        $gallery->delete();

        return response()->json(['message' => 'Galeri foto berhasil dihapus'], 200);
    }
}

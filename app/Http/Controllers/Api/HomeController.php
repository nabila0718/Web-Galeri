<?php

namespace App\Http\Controllers\Api;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // Menampilkan data homepage dalam bentuk JSON
    public function index()
    {
        // Ambil semua gambar
        $images = Image::all();

        // Ambil galeri yang statusnya 'active', dengan relasi post dan images
        $galleries = Gallery::with(['post', 'images'])
            ->where('status', 'active')
            ->take(5)
            ->get();

        // Ambil postingan terbaru
        $latestPost = Post::latest()->first();

        // Kembalikan data dalam format JSON
        return response()->json([
            'galleries' => $galleries,
            'latestPost' => $latestPost,
            'images' => $images,
        ], 200);
    }
}

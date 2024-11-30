<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Post;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // Ambil semua data galeri dengan relasi 'post' yang di-load bersama
        $galleries = Gallery::with('post')->get(); // Menggunakan get() untuk mendapatkan data dalam bentuk collection

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        // Ambil semua data posts
        $posts = Post::all(); // Mengambil semua data post

        return view('admin.galleries.create', [
            'title' => 'Tambah Galeri Foto',
            'posts' => $posts, // Kirim data posts ke view
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gallery::create([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect('/galleries')->with('success', 'Galeri Foto telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        return view('admin.galleries.show', [
            'title' => 'Detail Galeri Foto',
            'gallery' => $gallery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    { 
        // Ambil semua data posts
        $posts = Post::all(); // Mengambil semua data post

        return view('admin.galleries.edit', [
            'title' => 'Edit Gallery Foto',
            'gallery' => $gallery,
            'posts' => $posts, // Kirim data posts ke view
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $gallery->update([
            'post_id' => $request->post_id,
            'position' => $request->position,
            'status' => $request->status,
        ]);

        return redirect('/galleries')->with('success', 'Galeri Foto telah diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect('/galleries')->with('success', 'Galeri Foto telah dihapus');
    }
}

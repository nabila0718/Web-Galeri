<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{  
     public function index()
        {
            $images = Image::all(); // Mengambil semua data dari tabel `images`
            return view('galeri', compact('images')); // Kirim data ke view 'galeri'
        }

    public function store(Request $request){
        $request->validate([
            'gallery_id' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048',
            'title' => 'required',
        ]);

       $file = $request->file('file');

       $fileName = time() . '-' . $file->extension();

       $file->move(public_path('images'), $fileName);

       Image::create([
        'gallery_id' => $request->gallery_id,
        'file' => $fileName,
        'title' => $request->title,
       ]);

       return back()->with('success', 'Foto berhasil ditambahkan');
    }

    public function destroy($id)

    {
        $image = Image::find($id);

        unlink(public_path('images/' . $image->file));

        $image->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,heic|max:2048', // Validasi file gambar
        ]);

        // Mencari gambar berdasarkan ID
        $image = Image::findOrFail($id);

        // Mengupdate judul
        $image->title = $request->title;

        // Jika ada file gambar baru, upload dan ganti gambar
        if ($request->hasFile('file')) {
            // Hapus gambar lama jika ada
            unlink(public_path('images/' . $image->file));

            // Upload gambar baru
            $file = $request->file('file');
            $fileName = time() . '-' . $file->extension();
            $file->move(public_path('images'), $fileName);

            // Update file path di database
            $image->file = $fileName;
        }

        // Simpan perubahan
        $image->save();

        return back()->with('success', 'Foto berhasil diperbarui');
    }

}
<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // Menampilkan semua post
    public function index()
    {
        $posts = Post::all(); // Mengambil semua post
        return response()->json($posts, 200); // Mengembalikan post dalam format JSON
    }

    // Menampilkan detail post berdasarkan ID
    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        return response()->json($post, 200); // Mengembalikan post berdasarkan ID dalam format JSON
    }

    // Menambahkan post baru
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tittle' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|integer|exists:categories,id',
            'user_id' => 'required|integer|exists:user,id',
            'status' => 'required|in:draft,published',
        ]);
    
        // Buat post baru
        $post = Post::create($validatedData);
    
        return response()->json([
            'message' => 'Post created successfully',
            'data' => $post,
        ], 201);
    }
    // Mengupdate post berdasarkan ID
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|string',
        ]);

        // Mengupdate post
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        // Mengembalikan respons sukses
        return response()->json([ 
            'message' => 'Post berhasil diupdate',
            'data' => $post
        ], 200);
    }

    // Menghapus post berdasarkan ID
    public function destroy($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'message' => 'Post tidak ditemukan'
            ], 404);
        }

        // Menghapus post
        $post->delete();

        return response()->json([
            'message' => 'Post berhasil dihapus'
        ], 200);
    }

    // Menampilkan post yang dipublikasikan (agenda)
    public function agenda()
    {
        $posts = Post::where('status', 'publish')->get(); // Mengambil semua post dengan status 'publish'
        return response()->json($posts, 200); // Mengembalikan post yang dipublikasikan
    }
}

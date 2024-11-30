<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mengambil semua data post
        $posts = Post::all();

        //
        return view('admin.posts.index', [
            'posts' => $posts,
            'title' => 'Post',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'title' => 'Buat Post',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       Post::create([
        'title' => $request->title,
        'content' => $request->content,
        'category_id' => $request->category_id,
        'user_id' => Auth::id(),
        'status' => $request->status,
       ]);

       return redirect('/posts')->with('success', 'Post berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'title' => 'Edit Post',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);

        return redirect('/posts')->with('success', 'Post berhasil diupdate');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/posts')->with('success', 'Post berhasil dihapus');
    }

    public function agenda()
{
    // Mengambil data post yang dipublikasikan
    $posts = Post::where('status', 'publish')->get();

    // Mengambil data gambar dari galeri
    $images = Image::all();

    // Mengembalikan view dengan data posts dan images
    return view('agenda', [
        'posts' => $posts,
        'images' => $images,
        'title' => 'Agenda',
    ]);
}


}

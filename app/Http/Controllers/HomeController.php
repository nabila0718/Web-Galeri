<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
{
    $images = Image::all(); // Atau gunakan paginasi seperti ->paginate(6)
    

    $galleries = Gallery::with(['post', 'images'])->where('status', 'active')->take(5)->get();
    $latestPost = Post::latest()->first();
 // Menampilkan data yang dikirimkan ke view

    return view('homepage', compact('galleries', 'latestPost', 'images'));
}

}

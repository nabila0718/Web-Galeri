<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk menampilkan halaman login
Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login')->middleware('guest');

// Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

// Route untum pengunjung yang sudah login
Route::middleware('auth')->group(function (){
    Route::get('/admin', function () {
        return view('admin.dashboard.index');
    });
    Route::get('/users', [UserController::class, 'index'])->name('users.index'); // Menampilkan halaman manajemen admin
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create'); // Form tambah admin
    Route::post('/users', [UserController::class, 'store'])->name('users.store'); // Simpan data admin baru
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit'); // Form edit admin
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update'); // Update data admin
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); // Hapus data admin

    // Route untuk logout
    Route::get('/logout', [AuthController::class, 'logout']);

    // Route untuk CRUD category
    Route::resource('categories', CategoryController::class);

    // Route untuk CRUD posts
    Route::resource('posts', PostController::class);

    // Route untuk CRUD gallery
    Route::resource('galleries', GalleryController::class);

    // Route untuk menyimpan foto yang diupload
    Route::post('/images/store', [ImageController::class, 'store']);

    Route::put('/images/{image}', [ImageController::class, 'update'])->name('images.update');

    // Route untuk menghapus foto
    Route::delete('/images/{id}', [ImageController::class, 'destroy']);
    // routes/web.php

    Route::get('/', [ImageController::class, 'showGallery']); // Menampilkan gambar-gambar di halaman utama

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/galeri', [ImageController::class, 'index'])->name('galeri');

    Route::get('/informasi', function () {
        return view('informasi');
    })->name('informasi');

    Route::get('/agenda', [PostController::class, 'agenda'])->name('agenda');

});


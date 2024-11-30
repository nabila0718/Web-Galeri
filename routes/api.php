<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\GalleryController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// Category Routes
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);
Route::post('categories', [CategoryController::class, 'store']);
Route::put('categories/{id}', [CategoryController::class, 'update']);
Route::delete('categories/{id}', [CategoryController::class, 'destroy']);

// Gallery Routes
Route::get('galleries', [GalleryController::class, 'index']);
Route::get('galleries/{id}', [GalleryController::class, 'show']);
Route::post('galleries', [GalleryController::class, 'store']);
Route::put('galleries/{id}', [GalleryController::class, 'update']);
Route::delete('galleries/{id}', [GalleryController::class, 'destroy']);

// Homepage Route
Route::get('homepage', [HomeController::class, 'index']);

// Image Routes
Route::get('images', [ImageController::class, 'index']);
Route::post('images', [ImageController::class, 'store']);
Route::delete('images/{id}', [ImageController::class, 'destroy']);

// Post Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);
});


// Agenda Route (Published Posts)
Route::get('agenda', [PostController::class, 'agenda']);

// User Routes
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

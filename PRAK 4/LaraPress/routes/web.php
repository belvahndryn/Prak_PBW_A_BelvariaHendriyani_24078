<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController; // Sesuaikan jika ada Controller Post
use Illuminate\Support\Facades\Route;

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Rute Tentang Kami dan Kontak
Route::get('/tentang-kami', function () {
    return view('about'); // Mengarahkan ke resources/views/about.blade.php
});

Route::get('/kontak', function () {
    return view('contact'); // Mengarahkan ke resources/views/contact.blade.php
});

// Dashboard (Memerlukan Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute yang Dilindungi Autentikasi (Bagian 4 Praktikum)
Route::middleware('auth')->group(function () {
    // Rute Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute Post / CRUD Blog (Bagian 4)
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
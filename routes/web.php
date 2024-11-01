<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BeritaController;

// Make the root URL ('/') display the list of categories
Route::get('/', [KategoriController::class, 'index'])->name('home');

// Route to show the list of categories
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// Route to show berita (news) within a specific category by its ID
Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');

// Route to show the details of a specific berita (news) item by its ID
Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');
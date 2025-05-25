<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\MahasiswaController;

// Rute untuk halaman beranda dan tentang
Route::get('/', [PageController::class, 'index']);
Route::get('/tentang', [PageController::class, 'tentang']);

// Rute untuk Post (artikel)
Route::resource('posts', PostController::class);

// Rute untuk Mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);



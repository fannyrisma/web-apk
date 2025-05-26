<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Student;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Komentar kode yang mencoba mengakses database
        // $latestPosts = Post::latest()->take(3)->get();
        
        // Gunakan data dummy sementara
        $latestPosts = [];
        
        // Komentar kode yang mencoba menghitung jumlah mahasiswa
        // $studentCount = Student::count();
        $studentCount = 0;
        
        // Mengirim data ke view welcome.blade.php
        return view('welcome', [
            'latestPosts' => $latestPosts,
            'studentCount' => $studentCount
        ]);
    }
    
    public function tentang()
    {
        $nama = "Pengguna Laravel";
        
        // Data untuk halaman tentang
        $info_halaman = [
            'judul' => 'Tentang Kami',
            'deskripsi' => 'Sistem Informasi Akademik adalah platform terpadu untuk pengelolaan data mahasiswa dan informasi akademik yang memudahkan akses terhadap layanan pendidikan.'
        ];
        
        return view('tentang', [
            'nama_pengguna' => $nama,
            'info_halaman' => $info_halaman
        ]);
    }
    
    // Method lainnya...
}








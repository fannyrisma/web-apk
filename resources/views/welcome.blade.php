@extends('layouts.app')

@section('title', 'Beranda - Sistem Akademik')

@section('content')
<!-- Hero Section -->
<div class="container">
    <div class="p-5 mb-4 bg-primary text-white rounded-3 shadow">
        <div class="container-fluid py-5">
            <h1 class="display-4 fw-bold">Sistem Informasi Akademik</h1>
            <p class="col-md-8 fs-4">Platform terpadu untuk pengelolaan data mahasiswa dan informasi akademik terkini mahasiswa berprestasi.</p>
        </div>
    </div>

    <!-- Bagian Fitur - Hanya tampilkan yang terhubung -->
    <div class="row g-4 py-4 row-cols-1 row-cols-md-2 mb-5">
        <div class="col">
            <div class="card h-100 shadow-sm border-0 bg-light">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-gradient text-white mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-journal-text fs-2"></i>
                    </div>
                    <h3 class="fs-4 fw-bold">Artikel & Pengumuman</h3>
                    <p class="mb-0">Akses informasi terbaru seputar mahasiswa berprestasi.</p>
                    <a href="{{ url('/posts') }}" class="btn btn-sm btn-primary mt-3">Baca Blog</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 shadow-sm border-0 bg-light">
                <div class="card-body text-center p-4">
                    <div class="feature-icon bg-primary bg-gradient text-white mb-3 mx-auto rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="bi bi-info-circle-fill fs-2"></i>
                    </div>
                    <h3 class="fs-4 fw-bold">Tentang Kami</h3>
                    <p class="mb-0">Pelajari lebih lanjut tentang sistem dan layanan yang kami sediakan.</p>
                    <a href="{{ url('/tentang') }}" class="btn btn-sm btn-primary mt-3">Selengkapnya</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bagian Artikel Terbaru -->
    @if(isset($latestPosts) && count($latestPosts) > 0)
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="border-bottom pb-2 mb-4"><i class="bi bi-newspaper me-2"></i>Artikel Terbaru</h2>
        </div>
        @foreach($latestPosts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm hover-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge bg-primary">Artikel</span>
                        <small class="text-muted">{{ $post->created_at->format('d M Y') }}</small>
                    </div>
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ Str::limit(strip_tags($post->content ?? ''), 100) }}</p>
                </div>
                <div class="card-footer bg-transparent border-top-0">
                    <a href="{{ url('/posts/' . $post->id) }}" class="btn btn-sm btn-outline-primary">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="alert alert-info">
        <i class="bi bi-info-circle me-2"></i>Belum ada artikel terbaru.
    </div>
    @endif
</div>
@endsection

@push('styles')
<style>
    /* Tambahkan Bootstrap Icons */
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css");
    
    /* Gaya kustom */
    .hover-card {
        transition: transform 0.3s ease;
    }
    
    .hover-card:hover {
        transform: translateY(-5px);
    }
    
    .feature-icon {
        transition: all 0.3s ease;
    }
    
    .card:hover .feature-icon {
        transform: scale(1.1);
    }
</style>
@endpush
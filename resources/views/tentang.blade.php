@extends('layouts.app')

@section('title', $info_halaman['judul'])

@section('content')
<div class="container">
    <!-- Header Section -->
    <div class="p-5 mb-4 bg-primary text-white rounded-3 shadow">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">{{ $info_halaman['judul'] }}</h1>
            <p class="col-md-8 fs-4">{{ $info_halaman['deskripsi'] }}</p>
        </div>
    </div>
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
</style>
@endpush

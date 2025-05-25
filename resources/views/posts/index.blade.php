@extends('layouts.app')

@section('title', 'Daftar Mahasiswa Berprestasi')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Mahasiswa Berprestasi</h1>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Tambah Mapres</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($posts->isEmpty())
        <p>Belum ada yang terdaftar.</p>
    @else
        <ul class="list-group">
            @foreach ($posts as $post)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-1"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h5>
                        <small>Dibuat pada: {{ $post->created_at->format('d M Y, H:i') }}</small>
                    </div>
                    <div>
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning me-2">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus post ini?')">Hapus</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
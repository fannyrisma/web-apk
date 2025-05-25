@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container">
    <article>
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">Diterbitkan pada {{ $post->created_at->format('d F Y, H:i') }}</p>
        @if($post->updated_at != $post->created_at)
        <p class="text-muted fst-italic"><small>Diperbarui pada {{ $post->updated_at->format('d F Y, H:i') }}</small></p>
        @endif
        <hr>
        <div class="post-content">
            {!! nl2br(e($post->content)) !!} {{-- nl2br untuk baris baru, e() untuk escaping --}}
        </div>
    </article>
    <hr>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Kembali ke Dasboard.</a>
    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mt-3">Edit</a>
</div>
@endsection
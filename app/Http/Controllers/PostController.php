<?php

namespace App\Http\Controllers;

use App\Models\Post; // Impor model Post
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get(); // Mengambil semua post, diurutkan terbaru dulu
        // atau $posts = Post::latest()->get();
        return view('posts.index', ['posts' => $posts]); // Mengirim data posts ke view 'posts.index'
    }
    public function show(Post $post) // Laravel akan otomatis mengambil post berdasarkan ID (Route Model Binding)
   {
    return view('posts.show', ['post' => $post]);
   }
   public function create()
{
    return view('posts.create');
}

/**
 * Store a newly created resource in storage.
 */
    public function store(Request $request)
    {
    // Validasi input
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    // Cara 1: Membuat dan menyimpan post baru
    // $post = new Post;
    // $post->title = $validatedData['title'];
    // $post->content = $validatedData['content'];
    // $post->save();

    // Cara 2: Menggunakan mass assignment (pastikan $fillable di model sudah diatur)
    Post::create($validatedData);

    return redirect()->route('posts.index')->with('success', 'Post berhasil ditambahkan!');
   }
   public function edit(Post $post)
{
    return view('posts.edit', ['post' => $post]);
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, Post $post)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    $post->update($validatedData);

    return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui!');
}

/**
 * Remove the specified resource from storage.
 */
public function destroy(Post $post)
{
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
}
}
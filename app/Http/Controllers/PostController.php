<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('master', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validasi data input jika diperlukan
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        // Simpan data baru ke dalam database
        Post::create($request->all());

        $data = $request->except('_token');

        // Redirect ke halaman index
        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully');
    }

    // Metode lain seperti edit, update, delete dapat ditambahkan sesuai kebutuhan
}

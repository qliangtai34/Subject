<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('tags');

        // タグで絞り込み
        if ($request->has('tag')) {
            $tagName = $request->tag;
            $query->whereHas('tags', function ($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }

        $posts = $query->latest()->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::with(['comments', 'tags'])->findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }
}

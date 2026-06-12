<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('tags')->withCount('comments');

        if ($request->has('tag')) {
            $tagName = $request->tag;
            $query->whereHas('tags', function ($q) use ($tagName) {
                $q->where('name', $tagName);
            });
        }

        $posts = $query->latest()->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show($y)
    {
        $post = Post::with(['comments', 'tags'])->findOrFail($y);

        return view('posts.show', ['post' => $post]);
    }
}

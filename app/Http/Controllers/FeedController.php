<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        return view('layouts.home.feed');
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Post::create([
            'content' => $request->content,
            'user_id'  => auth()->id(),
        ]);

        return response()->json(['message' => 'Post created.'], 200);
    }

    public function getPosts()
    {
        $posts = Post::with("user")->orderByDesc("created_at")->Paginate(10);

        return view('components.feed.posts', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::findOrFail($id);

        return view('components.feed.post', compact('post'));
    }
}

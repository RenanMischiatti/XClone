<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index()
    {
        return view('layouts.home.feed');
    }

    public function store(ContentRequest $request) 
    {
        Post::create([
            'content' => $request->content,
            'user_id'  => auth()->id(),
        ]);

        return response()->json(['message' => 'Post created.'], 200);
    }

    public function getPosts()
    {
        $posts = Post::with("user")
        ->orderByDesc("created_at")
        ->where(function($query) {
            $query->whereNull('parent_id')
                  ->whereNull('reply_id');
        })
        ->withCount('comments')
        ->Paginate(10);

        return view('components.feed.posts.posts', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::with(
            ['comments' => fn($query) => $query->where('parent_id', $id)->orderBy('id', 'DESC')]
        )->findOrFail($id);

        $urlPrevious = $post->isOriginalPost() ? route('index') : route('show.post', ['id' => $post->parent_id]);

        return view('components.feed.posts.post', compact('post', 'urlPrevious'));
    }

    public function createComment($id, ContentRequest $request)
    {       
        $post = Post::findOrFail($id);

        $comment = Post::create([
            'user_id' => auth()->id(),
            'parent_id' => $id,
            'content' => $request->content
        ]);

        return response()->json([
            'status'  => 'success',
            'type'    => 'comment',
            'message' => 'Comment created successfully.',
            'comment' => $id,
        ]);
    }

    public function getThread($post_id)
    {
        $comments = Post::whereParentId($post_id)->get();

        return view('components.feed.posts.comments.comments', compact('comments'));
    }

}

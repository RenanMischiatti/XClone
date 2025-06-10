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
        $posts = Post::with("user")->orderByDesc("created_at")->Paginate(10);

        return view('components.feed.posts.posts', compact('posts'));
    }

    public function showPost($id)
    {
        $post = Post::with(
            ['comments' => fn($query) => $query->whereNull('parent_comment_id')]
        )->findOrFail($id);

        return view('components.feed.posts.post', compact('post'));
    }

    public function createComment($id, ContentRequest $request)
    {       
        $post = Post::findOrFail($id);

        $comment = Comment::create([
            'user_id' => auth()->id(),
            'post_id' => $id,
            'content' => $request->content
        ]);

        return response()->json([
            'status' => 'success',
            'type' => 'comment',
            'message' => 'Comment created successfully.',
            'comments' => $this->reloadComments($id),
        ]);
    }

    protected function reloadComments($post_id)
    {
        $comments = Comment::wherePostId($post_id)->whereNull('parent_comment_id')->get();

        return view('components.feed.posts.comments.comments', compact('comments'));
    }

}

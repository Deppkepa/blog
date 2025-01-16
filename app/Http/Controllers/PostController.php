<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::where('flag_moder', true)->get();
        return view('post.index', compact('posts', 'comments'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->only(['title', 'content', 'time_start_pub']));
        return redirect()->route('post.index');
    }

    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'time_start_pub' => 'required'
        ]);

        $post->update($request->all());
        $post->been_published = false;
        $post->save();
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function togglePublish(Post $post)
    {
        $post->is_published = !$post->is_published;
        $post->save();
        return redirect()->route('post.index');
    }
    
    public function createComment(Request $request, $numberPost)	
    {		
        $request->validate([
            'author' => 'required|string',
            'time_start_pub' => 'required',
            'content' => 'required|string',
        ]);

        Comment::create([
            'post_id' => $numberPost,
            'author' => $request->author,
            'content' => $request->content,
            'time_start_pub' => $request->time_start_pub,
            'flag_moder' => false
        ]);

       return redirect()->route('post.index', $numberPost);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function index()
	{
		$comments = Comment::where('flag_moder', false)->get();
		return view('comments.index',compact('comments'));
	}
	
	public function modered(Comment $comment)
    {
        $comment->flag_moder = true;
		$comment->save();
        return redirect()->back();
    }
}

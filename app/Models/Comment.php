<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Post;

class Comment extends Model
{   
    use hasFactory;
    protected $fillable = ['post_id', 'author', 'content', 'flag_moder'];
    public function post()
	{
		return $this->belongsTo(Post::class, 'post_id');
	}

}

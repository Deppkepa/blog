<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Post;

class StartPublisher extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:start-publisher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Опубликовывает по времени пост';

    /**
     * Execute the console command.
     */
    public function handle() {
		$posts = Post::where('is_published',false)->where('time_start_pub',"<=",str_replace(' ', 'T', now()))->where('been_published', false)->get();
		foreach ($posts as $post) {			
			$post->is_published = true;
			$post->time_start_pub = now();
            $post->been_published = true;
			$post->save();
            
		}
	}
}

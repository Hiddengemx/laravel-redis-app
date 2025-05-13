<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
// use Illuminate\Support\Facades\Redis;

class RedisWork extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $str = 'Hello world';
        // $result = '';

        // if(Cache::has('greeting')) {
        //     $result = Cache::get('greeting');
        // } else {
        //     Cache::put('greeting', $str);
        //     $result = $str;
        // }

        // $str = "Hello world";
        // $result = '';
        // $result = Cache::rememberForever('greeting', function () use($str) {
        //     return $str;
        // });

        // dd($result);


        // Redis::set('greeting', 'Hello world!');
        // $greeting = Redis::get('greeting');
        // dd($greeting);


        // $post = Post::find(1);
        // Redis::set('posts:' . $post->id, $post);
        // $post = Post::make((array)json_decode($post));
        // dd($post);


        // Redis::lpush('workers', 'Michael', 'Alex', "Mary");
        
        // $workers = Redis::lrange('workers', 0, -1);
        // dd($workers);

                
        Post::all()->each(function ($post) {
            Cache::put('posts:' . $post->id, $post);
        });
    }
}

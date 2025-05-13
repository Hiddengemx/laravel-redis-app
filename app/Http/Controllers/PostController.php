<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(): View  
    {
        $posts = Cache::rememberForever('posts:all', function() {
            return Post::all();
        });

        return view('posts', ["posts" => $posts]);
    }

    public function show($id): View 
    {
        $post = Cache::get('posts:' . $id);

        return view('post', ["post" => $post]);
    }
}

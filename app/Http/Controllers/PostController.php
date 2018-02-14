<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $postEloquent){
        $posts = $postEloquent->all();

        return view('blog.index',compact('posts'));
    }
}

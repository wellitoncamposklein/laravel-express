<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Post $postEloquent){
        $posts = $postEloquent->paginate(5);

        return view('blog.index',compact('posts'));
    }
}

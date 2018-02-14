<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = [
            0 => 'Meu primeiro Post',
            1 => 'Meu segundo Post',
            2 => 'Meu terceiro Post',
            3 => 'Meu quarto Post'
        ];

        return view('blog.index',compact('posts'));
    }
}

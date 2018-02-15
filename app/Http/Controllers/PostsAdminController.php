<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsAdminController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index(){
        $posts = $this->post->all();

        return view('admin.posts.index',compact('posts'));
    }
}

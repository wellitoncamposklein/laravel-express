<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
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
        $posts = $this->post->paginate(5);

        return view('admin.posts.index',compact('posts'));
    }

    public function create(){
        return view('admin.posts.create');
    }

    public function store(PostRequest $requestEloquent){
        $this->post->create($requestEloquent->all());

        return redirect()->route('admin.index');
    }
}

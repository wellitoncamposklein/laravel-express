<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
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
        $tags = array_filter(array_map('trim',explode(',',$requestEloquent->tags)));
        $tagsIDs = [];

        foreach ($tags as $tagName){
            //ira consultar e o banco retornando o Id se da existente
            //caso nao exista ira gravar um novo e retornar o seu novo id
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }

        $post = $this->post->create($requestEloquent->all());
        
        $post->tags()->sync($tagsIDs);//antes de gravar a relacao verifica se ja existe

        return redirect()->route('admin.index');
    }
    public function edit($id){
        $post = $this->post->find($id);

        return view('admin.posts.edit',compact('post'));
    }
    public function update($id, PostRequest $requestEloquent){
        $this->post->find($id)->update($requestEloquent->all());

        return redirect()->route('admin.index');
    }

    public function destroy($id){
        $this->post->find($id)->delete();

        return redirect()->route('admin.index');
    }
}

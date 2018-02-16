<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $post = $this->post->create($requestEloquent->all());
        
        $post->tags()->sync($this->getTagsIDs($requestEloquent->tags));//antes de gravar uma nova relacao, verifica se ja existe
        return redirect()->route('admin.index');
    }
    public function edit($id){
        $post = $this->post->find($id);

        return view('admin.posts.edit',compact('post'));
    }
    public function update($id, PostRequest $requestEloquent){
        $this->post->find($id)->update($requestEloquent->all());

        $post = $this->post->find($id);

        $post->tags()->sync($this->getTagsIDs($requestEloquent->tags));//antes de gravar uma nova relacao, verifica se ja existe
        return redirect()->route('admin.index');
    }

    public function destroy($id){
        $this->post->find($id)->delete();

        return redirect()->route('admin.index');
    }

    private function getTagsIDs($tags){
        /*
         * explode() aonde informar espacos, irei entender como um novo obj pro array
         * array_map('trim','') utilizando para retirar os espacos do inicio e fim dos obj
         * array_filter() irei retornar um array sem espacos
         * */
        $replace = array("\"", "'");
        $filtered = str_replace($replace, "", $tags);

        $tagList = array_filter(array_map('trim',explode(',',$filtered)));
        $tagsIDs = [];

        //ira consultar e o banco retornando o Id da existente
        //caso nao exista ira gravar um novo e retornar o seu novo id
        foreach ($tagList as $tagName){
            //firstOrCreate = traz se existir, se nao cria um novo
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }

        return $tagsIDs;
    }
}

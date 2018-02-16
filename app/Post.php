<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable =
        [
            'title',
            'content'
        ];

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'posts_tags');
    }

    /*
     * as palavras (get e Attribute) sao obrigatorios
     * o que fica entre elas e o atributo dinamico
     * */
    public function getTagListAttribute(){
        /*
         * pluck('name_col') ira retornar apenas a coluna passada no parametro
         * */
        $tags = $this->tags()->pluck('name')->all();
        return implode(' ',$tags);
    }
}

@extends('layouts.app')

@section('title','Blog')

@section('content')
    <h3>Feed</h3>
    @foreach($posts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <b>Tags:</b>
        <ul>
            @foreach($post->tags as $tag)
                <li>{{ $tag->name }}</li>
            @endforeach
        </ul>

        <h5>Comments</h5>
        @foreach($post->comments as $comment)
            <b>{{ $comment->name }}: </b>{{ $comment->comment }}
        @endforeach
        <hr>
    @endforeach
    {{ $posts->links() }}
@stop
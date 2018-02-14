@extends('template')

@section('title','Blog')

@section('content')
    <br><br><br>
    <h3>Feed</h3><br><br>
    @foreach($posts as $post)
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->content }}</p>
        <h5>Comments</h5>
        @foreach($post->comments as $comment)
            <b>{{ $comment->name }}: </b>{{ $comment->comment }}
        @endforeach
        <hr>
    @endforeach
@stop
@extends('template')

@section('title','Blog')

@section('content')
    <br><br><br>
    <h3>Feed de Notícias</h3><br><br>
    @foreach($posts as $post)
        <h4>{{ $post->title }}</h4>
        <p>{{ $post->content }}</p>
        <hr>
    @endforeach
@stop
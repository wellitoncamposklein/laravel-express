@extends('template')

@section('title','Blog')

@section('content')
    <br><br><br><br>
    <h3>Feed de Notícias</h3><br><br>
    @foreach($posts as $post)
        <p>{{ $post }}</p><hr/>
    @endforeach
@stop
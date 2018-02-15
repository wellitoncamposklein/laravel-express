@extends('template')

@section('title','Blog Admin')

@section('content')
    <div class="row">
        <h3>Blog Admin</h3>
    </div>

    <div class="row">
        <a href="{{ route('admin.create') }}" class="btn btn-success">
            New Post
        </a>
    </div>
    <br>

    <div class="row">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Action</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>
                    <a href="{{route('admin.edit',[$post->id])}}" class="btn btn-default">Edit</a>
                    <a href="{{route('admin.destroy',[$post->id])}}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    {{ $posts->links() }}
@stop
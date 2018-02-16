@extends('layouts.app')

@section('title','Blog Admin')

@section('content')
    <h3>Create new Post</h3>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'admin.store','method'=>'post']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags','Tags:') !!}
        {!! Form::textarea('tags',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
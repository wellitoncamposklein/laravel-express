@extends('layouts.app')

@section('title','Blog Admin')

@section('content')
    <h3>Edit Post: <b>{{$post->title}}</b></h3>
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::model($post,['route'=>['admin.update',$post->id],'method'=>'put']) !!}

    @include('admin.posts._form')

    <div class="form-group">
        {!! Form::label('tags','Tags:',['class'=>'control-label']) !!}
        {!! Form::textarea('tags',$post->tagList, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Save Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

@endsection
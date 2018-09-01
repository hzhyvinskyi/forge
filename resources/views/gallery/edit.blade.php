@extends('layouts.master')
@section('content')
    <h2 class="page-title" align="center">Edit post #{{ $post->id }}</h2>
    <div class="row">
        <div class="col-md-4 sidebar">
            <h2 class="sidebar-title">Last posts</h2>
            <hr>
        </div>
        <div class="col-md-7 offset-1">
            <h4>{{ $post->title }}</h4>
            <div class="image-block">
                <img src="/{{ $post->image }}" class="img-thumbnail" width="100%" alt="{{ $post->title }}">
            </div>
            <p>
                {{ $post->body }}
            </p>
            <hr>
            <div class="edit-title" align="center">Edit the data:</div>
            <form action="/gallery/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="title" value="{{ $post->title }}">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="body" class="form-control" cols="30" rows="10" placeholder="description">{{ $post->body }}</textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </p>
    </div>
@endsection

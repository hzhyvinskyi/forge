@extends('layouts.master')
@section('sidebar')
    @include('chunks.sidebar')
@endsection
@section('content')
        <div class="col-md-8 offset-1 content">
            <div class="post-item">
                <h2 class="page-title" align="center">Edit {{ $post->title }}</h2>
                <div class="post-item__image-block">
                    <img src="/{{ $post->image }}" class="img-thumbnail" width="100%" alt="{{ $post->title }}">
                </div>
                <p>
                    {{ $post->text }}
                </p>
                <hr>
            </div>
            <div class="edit-title" align="center">Edit the data:</div>
            <form action="/post/update/{{ $post->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="title" value="{{ $post->title }}">
                    <small class="error-message">{{ $errors->first('title') ?? '' }}</small>
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                    <small class="error-message">{{ $errors->first('image') ?? '' }}</small>
                </div>
                <div class="form-group">
                    <textarea name="text" class="form-control" cols="30" rows="10" placeholder="description">{{ $post->text }}</textarea>
                    <small class="error-message">{{ $errors->first('text') ?? '' }}</small>
                </div>
                <div class="form-group">
                    <label>
                        <input type="radio" name="category" class="form-control" value="1">{{ $post->category->find(1)->name }}
                    </label>
                    <label>
                        <input type="radio" name="category" class="form-control" value="2">{{ $post->category->find(2)->name }}
                    </label>
                    <small class="error-message">{{ $errors->first('category') ?? null }}</small>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            </form>
        </div>
@endsection

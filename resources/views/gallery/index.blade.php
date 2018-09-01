@extends('layouts.master')
@section('content')
    <h2 class="page-title" align="center">All posts</h2>
    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-3">
                <div class="post-item">
                    <h4 align="center">
                        <a href="/gallery/show/{{ $post->id }}">{{ $post->title }}</a>
                    </h4>
                    <div class="image-block">
                        <img src="{{ $post->image }}" class="img-thumbnail" width="100%" alt="{{ $post->title }}">
                    </div>
                    <p>
                        {{ $post->body }}
                    </p>
                    <div class="buttons">
                        <a href="/gallery/show/{{ $post->id }}" class="btn btn-info">Show</a>
                        <a href="/gallery/edit/{{ $post->id }}" class="btn btn-warning">Edit</a>
                        <a href="/gallery/delete/{{ $post->id }}" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection

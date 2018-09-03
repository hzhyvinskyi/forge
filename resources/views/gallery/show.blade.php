@extends('layouts.master')
@section('content')
    <div class="col-md-12 content">
        <div class="post-item">
            <h2 class="page-title" align="center">Post #{{ $post->id }}</h2>
            <h4>{{ $post->title }}</h4>
            <img src="/{{ $post->image }}" class="img-thumbnail post-item__image" alt="{{ $post->title }}">
            <p class="post-item__text">
                {{ $post->body }}
            </p>
        </div>
    </div>
@endsection

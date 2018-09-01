@extends('layouts.master')
@section('content')
    <h2 class="page-title" align="center">Post #{{ $post->id }}</h2>
    <hr>
    <div class="row">
        <div class="col-md-4 sidebar">
            <h2 class="sidebar-title">Last posts</h2>
            <hr>
        </div>
        <div class="col-md-7 offset-1">
            <h4 align="center">{{ $post->title }}</h4>
            <img src="/{{ $post->image }}" class="img-thumbnail" alt="{{ $post->title }}">
            <p>
                {{ $post->body }}
            </p>
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('sidebar')
    @include('chunks.sidebar')
@endsection
@section('content')
    <div class="col-md-8 offset-1 content">
        <h2 class="page-title" align="center">All posts</h2>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-3 all-posts">
                    <div class="post-item">
                        <table>
                            <tr>
                                <td>
                                    <h4 align="center">
                                        <a href="/gallery/show/{{ $post->id }}">{{ $post->title }}</a>
                                    </h4>
                                </td>
                            </tr>
                            <tr>
                                <td class="post-item__image-block">
                                    <a href="/gallery/show/{{ $post->id }}" title="{{ $post->title }}">
                                        <img src="{{ $post->image }}" class="img-thumbnail post-item__image" width="100%" alt="{{ $post->title }}">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="post-item__text">
                                        @if(strlen($post->body) > 50)
                                            {{ substr($post->body, 0, 50) }}...
                                        @else
                                            {{ $post->body }}
                                        @endif
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="post-item__buttons">
                                        <a href="/gallery/show/{{ $post->id }}" class="btn btn-info">Show</a>
                                        <a href="/gallery/edit/{{ $post->id }}" class="btn btn-warning">Edit</a>
                                        <a href="/gallery/delete/{{ $post->id }}" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('content')
    <div class="col-md-12 content">
        <h1>TESTING</h1>
        <p>{{ config('app.name') }}</p>
        <p>{{ env('APP_NAME') }}</p>
        <p>STR1: {{ str_random(rand(3, 16)) }}</p>
        <p>STR2: {{ str_slug('офушфу') }}</p>
        <p>{{ \Illuminate\Support\Facades\App::basePath() }}</p>
        @forelse($posts as $post)
            <a href="{{ route('gallery.index') }}">{{ $post['title'] }}</a><br>
        @empty
            nothing
        @endforelse
    </div>
@endsection

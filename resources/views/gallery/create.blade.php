@extends('layouts.master')
@section('sidebar')
    @include('chunks.sidebar')
@endsection
@section('content')
    <div class="col-md-8 offset-1 content">
        <div class="col-md-7 offset-1">
            <h2 class="page-title" align="center">Create post</h2>
            <form action="/gallery/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="title" value="{{ old('title') }}">
                    <small class="error-message">{{ $errors->first('title') ?? null }}</small>
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control" value="{{ old('image') }}">
                    <small class="error-message">{{ $errors->first('image') ?? null }}</small>
                </div>
                <div class="form-group">
                    <textarea name="body" class="form-control" cols="30" rows="10" placeholder="description">{{ old('body') }}</textarea>
                    <small class="error-message">{{ $errors->first('body') ?? null }}</small>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>
            </form>
        </div>
    </div>
@endsection

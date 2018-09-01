@extends('layouts.master')
@section('content')
    <h2 class="page-title" align="center">Create post</h2>
    <div class="row">
        <div class="col-md-4 sidebar">
            <h2 class="sidebar-title">Last posts</h2>
            <hr>
        </div>
        <div class="col-md-7 offset-1">
            <form action="/gallery/store" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="title">
                </div>
                <div class="form-group">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="body" class="form-control" cols="30" rows="10" placeholder="description"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>
            </form>
        </div>
    </div>
@endsection

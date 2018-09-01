@extends('layouts.master')
@section('content')
    <h1 class="page-title" align="center">Hello hello hello!?</h1>
    <div class="row">
        <div class="col-md-4 sidebar">
            <h2 class="sidebar-title">Last posts</h2>
            <hr>
            @include('chunks.sidebar')
        </div>
        <div class="col-md-7 offset-1">
            <img src="https://www.valuecoders.com/blog/wp-content/uploads/2018/05/laravel.jpg" class="post-image" width="100%" alt="box">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, alias animi architecto, consequatur
                et in inventore qui quos ratione recusandae repellendus voluptas voluptate, voluptates? Accusamus fugit
                illo non optio reiciendis.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, alias animi architecto, consequatur
                et in inventore qui quos ratione recusandae repellendus voluptas voluptate, voluptates? Accusamus fugit
                illo non optio reiciendis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, alias
                animi architecto, consequatur et in inventore qui quos ratione recusandae repellendus voluptas
                voluptate, voluptates? Accusamus fugit illo non optio reiciendis.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, alias animi architecto, consequatur
                et in inventore qui quos ratione recusandae repellendus voluptas voluptate, voluptates? Accusamus fugit
                illo non optio reiciendis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, alias
                animi architecto, consequatur et in inventore qui quos ratione recusandae repellendus voluptas
                voluptate, voluptates? Accusamus fugit illo non optio reiciendis.
            </p>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus, alias animi architecto, consequatur
                et in inventore qui quos ratione recusandae repellendus voluptas voluptate, voluptates? Accusamus fugit
                illo non optio reiciendis.
            </p>
        </div>
    </div>
@endsection

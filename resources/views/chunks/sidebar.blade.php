@foreach($posts as $post)
    <div class="post-item">
        <h3>
            <a href="/gallery/show/{{ $post->id }}">{{ $post->title }}</a>
        </h3>
        <p>
            {{ $post->body }}
        </p>
    </div>
    <hr>
@endforeach

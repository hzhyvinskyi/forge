<div class="col-md-3 sidebar">
    <h2 class="sidebar__title">Sidebar</h2>
    <hr>
    <a href="/post/categories" class="sidebar__link @if ($_SERVER['REQUEST_URI'] == "/post/categories") active @endif">All categories</a>
    @foreach($categories as $category)
        <a href="/post/categories/{{ $category->id }}" class="sidebar__link @if (preg_match("#^/post/categories/{$category->id}\??#ui", $_SERVER['REQUEST_URI'])) active @endif">{{ $category->name }}</a>
    @endforeach
    <hr>
    <a href="/documentation" class="sidebar__link">Documentation</a>
</div>

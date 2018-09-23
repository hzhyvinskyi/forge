<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '' || $_SERVER['REQUEST_URI'] == '/') active @endif">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item @if(preg_match('#^/post/categories#ui' , $_SERVER['REQUEST_URI'])) active @endif">
                <a class="nav-link" href="/post/categories">Gallery</a>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/post/create') active @endif">
                <a class="nav-link" href="/post/create">Create post</a>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/documentation') active @endif">
                <a class="nav-link" href="/documentation">Documentation</a>
            </li>
            <li class="nav-item @if($_SERVER['REQUEST_URI'] == '/testing') active @endif">
                <a class="nav-link" href="/testing">Testing</a>
            </li>
        </ul>
    </div>
</nav>

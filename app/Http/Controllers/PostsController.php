<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\CreatePost;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * @var Post
     */
    private $post;

    /**
     * GalleryController constructor.
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
        $this->middleware('access')->only('index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->post->getAll();
        return view('posts.index', compact('posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = $this->post->one($id);
        return view('posts.show', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $posts = $this->post->category();
        dd($posts);
        return view('posts.create', compact('posts'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePost $request)
    {
        $post = [
            'title' => $request->input('title'),
            'image' => $request->file('image'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category')
        ];

        $this->post->store($post);

        return redirect('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->post->one($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreatePost $request, $id)
    {
        $post = [
            'title' => $request->input('title'),
            'image' => $request->file('image'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category')
        ];

        dd($post);
        $this->post->updatex($id, $post);

        return redirect('/');
    }
//
//    /**
//     * @param $id
//     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
//     */
//    public function delete($id)
//    {
//        $this->gallery->remove($id);
//        return redirect('/');
//    }
}

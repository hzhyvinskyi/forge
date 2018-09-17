<?php

namespace App\Http\Controllers\Gallery;

use App\Http\Controllers\Controller;
use App\Gallery;
use App\Http\Requests\CreatePost;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * @var Gallery
     */
    private $gallery;

    /**
     * GalleryController constructor.
     * @param Gallery $gallery
     */
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
        $this->middleware('access')->only('index');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->gallery->getAll();
        return view('gallery.index', compact('posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = $this->gallery->one($id);
        return view('gallery.show', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('gallery.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePost $request)
    {
        $title = $request->input('title');
        $image = $request->file('image');
        $body = $request->input('body');

        $this->gallery->add($title, $image, $body);

        return redirect('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->gallery->one($id);
        return view('gallery.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreatePost $request, $id)
    {
        $title = $request->title;
        $image = $request->image;
        $body = $request->body;

        $this->gallery->update($id, $title, $image, $body);

        return redirect('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $this->gallery->remove($id);
        return redirect('/');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\GalleryService;

class GalleryController extends Controller
{
    /**
     * @var GalleryService
     */
    private $galleryService;

    /**
     * GalleryController constructor.
     * @param GalleryService $galleryService
     */
    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->galleryService->all();
        return view('gallery.index', compact('posts'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = $this->galleryService->one($id);
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
    public function store(Request $request)
    {
        $title = $request->input('title');
        $image = $request->file('image');
        $body = $request->input('body');

        $this->galleryService->add($title, $image, $body);

        return redirect('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = $this->galleryService->one($id);
        return view('gallery.edit', compact('post'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $title = $request->title;
        $image = $request->image;
        $body = $request->body;

        $this->galleryService->update($id, $title, $image, $body);

        return redirect('/');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $this->galleryService->destroy($id);
        return redirect('/');
    }
}

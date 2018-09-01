<?php

namespace App\Http\Controllers;

use App\Http\Services\GalleryService;

class HomeController extends Controller
{
    private $galleryService;

    public function __construct(GalleryService $galleryService)
    {
        $this->galleryService = $galleryService;
    }

    public function index()
    {
        $posts = $this->galleryService->all();

        return view('home')->with('posts', $posts);
    }

    public function about()
    {
        return view('about');
    }
}

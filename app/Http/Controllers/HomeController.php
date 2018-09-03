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
        return view('home');
    }

    public function about()
    {
        return view('about');
    }
}

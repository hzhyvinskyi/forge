<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Http\Requests\CreatePost;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @var Gallery
     */
    private $gallery;

    /**
     * HomeController constructor.
     * @param Gallery $gallery
     */
    public function __construct(Gallery $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function about()
    {
        $posts = [
            'post1' => [
                'title' => 'askg'
            ],
            'post2' => [
                'title' => 'AAA'
            ]
        ];
        return view('about', compact('posts'));
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function showForm()
    {
        return view('form');
    }

    public function testingForm(Request $request)
    {
        $this->validate($request, [
            'name' => 'bail|required|min:2|max:20',
            'surname' => 'bail|required|min:2|max:20',
            'email' => 'bail|required|email',
            'age' => 'nullable|integer|max:2',
            'text' => 'required'
        ]);

        return 'validated!';
    }
}

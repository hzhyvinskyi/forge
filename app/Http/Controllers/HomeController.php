<?php

namespace App\Http\Controllers;

use App\Gallery;
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
    public function testing()
    {
        $array = [
            'kwweam4211', 'lawerk', 'awktkj3', '', 'kjuawlfsdgkk'
        ];

        $collection = collect($array)->map(function ($element) {
            return strtoupper($element);
        })
        ->reject(function ($element) {
            return empty($element);
        });

        $collection2 = $collection->reject(function ($element) {
            return (strlen($element)) > 8;
        })->map(function ($element) { return strtolower($element); });
        dd($collection2);

        $posts = [
            'post1' => [
                'title' => 'askg'
            ],
            'post2' => [
                'title' => 'AAA'
            ]
        ];
        return view('about', compact('posts', 'collection'));
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

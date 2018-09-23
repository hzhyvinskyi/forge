<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @var Post
     */
    private $post;

    /**
     * @var Category[]|\Illuminate\Database\Eloquent\Collection
     */
    private $categories;

    /**
     * HomeController constructor.
     * @param Post $post
     * @param Category $categories
     */
    public function __construct(Post $post, Category $categories)
    {
        $this->post = $post;
        $this->categories = $categories::all();
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index()
    {
        return view('home', [
            'categories' => $this->categories
        ]);
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function documentation()
    {
        return view('documentation');
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

    /**
     * @param Request $request
     * @return string
     */
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

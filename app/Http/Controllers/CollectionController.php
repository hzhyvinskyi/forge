<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionController extends Controller
{
    private $posts = [
        'post' => [
            'title' => 'Test title',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores commodi culpa cum, dignissimos id maiores mollitia non pariatur quae quam quia quisquam quo rem soluta suscipit temporibus, vitae voluptatem voluptatibus!',
            'user_id' => 1,
            'status' => 'published'
        ],
        'post2' => [
            'title' => 'akwawW',
            'text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores commodi culpa cum, dignissimos id maiores mollitia non pariatur quae quam quia quisquam quo rem soluta suscipit temporibus, vitae voluptatem voluptatibus!',
            'user_id' => 1,
            'status' => 'hidden'
        ],
        'post3' => [
            'title' => 'Lawowar waejt',
            'text' => 'Heojima aeiortm arhwal hell',
            'user_id' => 2,
            'status' => 'published'
        ],
        'post4' => [
            'title' => 'Some title',
            'text' => 'Qwwat jmwato pwa9otrwja waktjioawj awkthji0 opaw',
            'user_id' => 3,
            'status' => 'published'
        ]
    ];

    private $array = [
        'name' => 'EXT',
        'age' => 24,
        'status' => 'zxc'
    ];

    public function __construct()
    {
        $posts = $this->posts;
        $array = $this->array;

        $this->map($posts);
    }

    public function run()
    {
        $collection = collect($this->posts);
//        $this->all($collection);
    }

    public function all($collection)
    {
        $collection = $collection->all();
        dd($collection);
    }

    public function combine()
    {
        $array = ['name', 'age'];
        $combined = collect($array)->combine(['COMBINE', 40])->all();
        dd($combined);
    }

    public function contains()
    {
        $array = $this->array;
        $contains = collect($array)->contains('EXT');
        dd($contains);
    }

    public function count($array)
    {
        $count = collect($array)->count();
        dd($count);
    }

    public function crossJoin($array)
    {
        $crossJoin = collect($array)->crossJoin(['kt', 'rbxz', 'www']);
        dump($crossJoin);
    }

    public function diff($array)
    {
        $diff = collect($array)->diff(['EXY', 24, 'zxc']);
        dd($diff);
    }

    public function every()
    {
        $each = collect([1, 2, 3, 4, 5])->every(function ($item) {
            return $item >= 1;
        });
        dd($each);
    }

    public function except($array)
    {
        $except = collect($array)->except(['name', 'status']);
        dd($except);
    }

    public function only($array)
    {
        $only = collect($array)->only('name');
        dd($only);
    }

    public function filter($array)
    {
        $filter = collect($array)->filter(function ($value) {
            return $value == 'EXT';
        });
        dd($filter);
    }

    public function reject($array)
    {
        $reject = collect($array)->reject(function ($value) {
            return $value == 'EXT';
        });
        dd($reject);
    }

    public function first()
    {
        $first = collect([1, 2, 3, 4, 5])->first(function ($value) {
            return $value > 1;
        });
        dd($first);
    }

    public function firstWhere($posts)
    {
        $firstWhere = collect($posts)->firstWhere('status', 'published');
        dd($firstWhere);
    }

    public function  flatMap($post)
    {
        $flatMap = collect($post)->flatMap(function ($values) {
            return array_map('strtoupper', $values);
        });
        dd($flatMap);
    }

    public function map($posts)
    {
        $map = collect($posts)->map(function ($value, $key) {
            return strlen($value['text']);
        });
        dd($map);
    }

    public function defaultMap($array)
    {
        $defaultMap = array_map('strlen', $array);
        dd($defaultMap);
    }
}

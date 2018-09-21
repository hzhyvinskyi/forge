<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    const POSTS_PER_PAGE = 4;

    protected $fillable = [
        'category_id', 'title', 'slug', 'image', 'intro', 'text', 'status'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAll()
    {
        $posts = self::paginate(self::POSTS_PER_PAGE);
        return $posts;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|null|object
     */
    public function one($id)
    {
        $post = self::find($id);
        return $post;
    }

    /**
     * @param $post
     */
    public function store($post)
    {
        $filename = $post['image']->store('uploads/' . strtolower(str_random(2)) . '/' . strtolower(str_random(2)));
        self::create([
            'category_id' => $post['category_id'],
            'title' => $post['title'],
            'slug' => str_slug($post['title']),
            'image' => $filename,
            'intro' => substr($post['text'], 0, 100),
            'text' => $post['text']
        ]);
    }

    /**
     * @param array $id
     * @param array $post
     * @return bool|void
     */
    public function updatex($id, $data)
    {
        $oldRecord = $this->one($id);
        dd($oldRecord);
        Storage::delete($oldRecord->image);
        $filename = $data['image']->store('uploads/' . strtolower(str_random(2)) . '/' . strtolower(str_random(2)));
        $post = new static([
            $data['category_id'],
            $data['title'],
            str_slug($data['title']),
            $filename,
            substr($data['text'], 0, 100),
            $data['text']
        ]);
        $post->save();
    }
//
//    /**
//     * @param $id
//     */
//    public function remove($id)
//    {
//        $oldRecord = $this->one($id);
//        Storage::delete($oldRecord->image);
//
//        DB::table('posts')->where('id', $id)->delete();
//    }
}

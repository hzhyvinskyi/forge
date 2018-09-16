<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Gallery
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function getAll()
    {
        $posts = DB::table('posts')->paginate(4);
        return $posts;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|null|object
     */
    public function one($id)
    {
        $post = DB::table('posts')->select()->where('id', $id)->first();
        return $post;
    }

    /**
     * @param $title
     * @param $image
     * @param $body
     */
    public function add($title, $image, $body)
    {
        $filename = $image->store('uploads/' . strtolower(str_random(2)) . '/' . strtolower(str_random(2)));
        DB::table('posts')->insert(['title' => $title, 'image' => $filename, 'body' => $body]);
    }

    /**
     * @param $id
     * @param $title
     * @param $image
     * @param $body
     */
    public function update($id, $title, $image, $body)
    {
        $oldRecord = $this->one($id);
        Storage::delete($oldRecord->image);

        $filename = $image->store('uploads/' . strtolower(str_random(2)) . '/' . strtolower(str_random(2)));

        DB::table('posts')->where('id', $id)->update(['title' => $title, 'image' => $filename, 'body' => $body]);
    }

    /**
     * @param $id
     */
    public function remove($id)
    {
        $oldRecord = $this->one($id);
        Storage::delete($oldRecord->image);

        DB::table('posts')->where('id', $id)->delete();
    }
}

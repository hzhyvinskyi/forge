<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Http\Requests\CreatePost;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

/**
 * Class PostsController
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    const POSTS_PER_PAGE = 8;

    /**
     * @var Post
     */
    private $post;

    /**
     * @var Category
     */
    private $category;

    /**
     * PostsController constructor.
     * @param Post $post
     * @param Category $category
     */
    public function __construct(Post $post, Category $category)
    {
        $this->post = $post;
        $this->category = $category;
        $this->middleware('access')->only('index');
    }

    /**
     * @param null $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function index($id = null)
    {
        if (is_null($id)) {
            $posts = $this->post->paginate(self::POSTS_PER_PAGE);
        } else {
            $id = (int)$id;
            $posts = $this->post::where('category_id', $id)->paginate(self::POSTS_PER_PAGE);
        }

        return view('posts.index' , [
            'posts' => $posts,
            'categories' => $this->getAllCategories()
        ]);
    }

    /**
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function show($id)
    {
        $post = $this->post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function create()
    {
        return view('posts.create', [
            'categories' => $this->getAllCategories()
        ]);
    }

    /**
     * @param CreatePost $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreatePost $request)
    {
        $postData = [
            'title' => $request->input('title'),
            'image' => $request->file('image'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category')
        ];

        $post = $this->post;
        $post->category_id = $postData['category_id'];
        $post->title = $postData['title'];
        $post->slug = str_slug($postData['title']);
        $post->image = '/' . $this->getSavedFilename($postData['image']);
        $post->intro = substr($postData['text'], 0, 45);
        $post->text = $postData['text'];
        $post->save();

        return redirect('/post/categories');
    }

    /**
     * @param $id
     * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
     */
    public function edit($id)
    {
        $post = $this->post::find($id);
        return view('posts.edit', [
            'post' => $post,
            'categories' => $this->getAllCategories()
        ]);
    }

    /**
     * @param CreatePost $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CreatePost $request, $id)
    {
        $data = [
            'title' => $request->input('title'),
            'image' => $request->file('image'),
            'text' => $request->input('text'),
            'category_id' => $request->input('category')
        ];

        $post = $this->post::find($id);
        Storage::delete($post->image);

        $post->category_id = $data['category_id'];
        $post->title = $data['title'];
        $post->slug = str_slug($data['title']);
        $post->image = '/' . $this->getSavedFilename($data['image']);
        $post->intro = substr($data['text'], 0, 45);
        $post->text = $data['text'];
        $post->save();

        return redirect("/post/show/{$post->id}");
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function delete($id)
    {
        $post = $this->post::find($id);
        if ($post->delete()) {
            Storage::delete($post->image);
        }

        return redirect('/post/categories');
    }

    /**
     * @param UploadedFile $file
     * @return false|string
     */
    private function getSavedFilename(UploadedFile $file)
    {
        return $file->store('uploads/' . strtolower(str_random(2)) . '/' . strtolower(str_random(2)));
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAllCategories()
    {
        return $this->category::all();
    }
}

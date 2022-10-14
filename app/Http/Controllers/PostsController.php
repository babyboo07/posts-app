<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = DB::table('posts')->leftJoin('users', 'posts.user_id', "=", 'users.id')
            ->leftJoin('images', function ($join) {
                $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
            })
            ->orderBy('created_at', 'desc')
            ->get(['posts.*', 'users.name', 'images.img']);
        return view('posts.index', compact('post'));
    }

    public function home()
    {
        $active = '';
        $post = DB::table('posts')
            ->leftJoin('categories', 'posts.cate_id', "=", 'categories.id')
            ->leftJoin('images', function ($join) {
                $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
            })
            ->get(['posts.*', 'images.img', 'categories.genre']);
        $category = DB::table('categories')->get();

        $top = DB::table('posts')
            ->leftJoin('categories', 'posts.cate_id', "=", 'categories.id')
            ->leftJoin('images', function ($join) {
                $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
            })->orderBy('posts.created_at', 'desc')->limit(1)->get(['posts.*', 'images.img', 'categories.genre']);

        $topList = DB::table('posts')->orderBy('created_at', 'desc')->leftJoin('images', function ($join) {
            $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
        })->limit(5)->get(['posts.*', 'images.img']);

        $topWorld = DB::table('posts')->leftJoin('images', function ($join) {
            $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
        })->where('posts.cate_id', '=', '1')->limit(4)->get(['posts.*', 'images.img']);

        $topHealth = DB::table('posts')->leftJoin('images', function ($join) {
            $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
        })->where('posts.cate_id', '=', '5')->limit(4)->get(['posts.*', 'images.img']);

        return view('webPage', compact('post', 'category', 'active', 'top', 'topList', 'topWorld', 'topHealth'));
    }

    public function searchCategory($id)
    {
        if ($id != null) {
            $post = DB::table('posts')
                ->leftJoin('categories', 'posts.cate_id', 'categories.id')
                ->leftJoin('images', function ($join) {
                    $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
                })
                ->where('cate_id', '=', $id)->get(['categories.genre', 'posts.id', 'posts.title', 'images.img']);
        }
        $active = $id;
        $category = DB::table('categories')->get();
        return view('welcome', compact('post', 'category', 'active'));
    }

    public function searchTitle(Request $request)
    {
        $title = $request->search;
        if ($title != null) {
            $post = DB::table('posts')->leftJoin('categories', 'posts.cate_id', 'categories.id')
                ->leftJoin('images', function ($join) {
                    $join->on('images.id', '=', DB::raw('(Select id from images where images.posts_id = posts.id LIMIT 1)'));
                })->where('title', $title)->get(['categories.genre', 'posts.id', 'posts.title', 'images.img']);
        }
        dd($post);
        $category = DB::table('categories')->get();
        return view('welcome', compact('post', 'category'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = DB::table('categories')->get();
        return view('posts.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'status' => ['required'],
            'cate_id' => ['required']
        ]);
        $content = $request->body;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $imageFile = $dom->getElementsByTagName('img');

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/storage/posts/" . time() . $item . '.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $imgeData);

            $images = new Images();
            $images->img = $image_name;
            $files[] = $images;

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $post = new Posts;
        $post->title = $request->title;
        $post->body = $content;
        $post->status = $request->status;
        $post->user_id = $request->user_id;
        $post->cate_id = $request->cate_id;

        $post->save();

        if (count($files)) {
            $post->images()->saveMany($files);
        }

        return redirect('/posts')->with('success', 'Posts Has Been updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $active = '';
        $post = DB::table('posts')->leftJoin('users', 'posts.user_id', "=", 'users.id')
            ->leftJoin('categories', 'posts.cate_id', "=", 'categories.id')
            ->where('posts.id', '=', $id)
            ->get(['posts.*', 'users.name', 'users.user_img', 'categories.genre']);
        if ($post !== null) {
            $post->images = DB::table('images')
                ->where('posts_id', '=', $id)->get(['images.img']);
        }
        $category = DB::table('categories')->get();
        $comment = DB::table('comments')
            ->leftJoin('users', 'comments.user_id', '=', 'users.id')
            ->where('posts_id', '=', $id)
            ->get(['comments.*', 'users.name', 'users.user_img']);
        return view('posts.detail', compact('post', 'category', 'comment', 'active'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Posts::find($id);
        $category = DB::table('categories')->get();
        return view('posts.edit', compact('post', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required'],
            'body' => ['required'],
            'status' => ['required'],
            'cate_id' => ['required']
        ]);
        $post = Posts::findOrFail($id);

        $content = $request->body;
        $dom = new \DomDocument();
        $dom->loadHtml($content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $imageFile = $dom->getElementsByTagName('img');
        // dd($imageFile);

        foreach ($imageFile as $item => $image) {
            $data = $image->getAttribute('src');
            if (strpos($data, ';') === false) {
                continue;
            }
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $imgeData = base64_decode($data);
            $image_name = "/storage/posts/" . time() . $item . '.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $imgeData);

            $files[] = $image_name;

            $image->removeAttribute('src');
            $image->setAttribute('src', $image_name);
        }

        $content = $dom->saveHTML();

        $post->title = $request->title;
        $post->body = $content;
        $post->status = $request->status;
        $post->user_id = $request->user_id;
        $post->cate_id = $request->cate_id;

        $post->save();

        return redirect('/posts')->with('success', 'Posts Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd($id);
        Posts::find($id)->delete();
        return redirect('/posts')->with('success', 'Posts has been deleted successfully');
    }
}

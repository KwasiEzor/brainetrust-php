<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $tags = Tag::distinct()->get();
        // $categories = Category::all();
        $posts = Post::with(['tags', 'comments', 'user'])->latest()->paginate(9);
        // dd($tags);
        return view('posts.index', compact('posts'));
    }

    public function categoriesWithPosts(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->with('tags', 'comments')
            ->latest()
            ->paginate(9);
        return $posts;
    }

    public function addComment(Post $post)
    {
        return $this->addComment($post);
    }

    public function search(Request $request)
    {
        // $categories = Category::all();
        // $tags = Tag::distinct()->get(['name']);
        $keywords = $request->input('query');

        if ($keywords != '') {
            $posts = Post::with(['tags', 'comments', 'user'])
                ->where('title', 'like', '%' . $keywords . '%')
                ->orWhere('content', 'like', '%' . $keywords . '%')
                ->orWhere('created_at', 'like', '%' . $keywords . '%')
                ->orWhere('updated_at', 'like', '%' . $keywords . '%')
                ->paginate(9);
            $posts->appends(['query' => $keywords]);
        } else {
            $posts = Post::with(['tags', 'comments', 'user'])->latest()->paginate(9);
        }
        return view('posts.search', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $otherCategoryPosts = Post::where('category_id', '=', $post->category_id)
            ->where('title', '!=', $post->title)
            ->with('tags', 'comments', 'user')
            ->get();

        $post = Post::where('id', '=', $post->id)
            ->with('tags', 'comments', 'user', 'category')
            ->get();
        // dd($post);
        return view('posts.show', compact('post', 'otherCategoryPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}

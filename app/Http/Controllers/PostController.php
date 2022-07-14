<?php

namespace App\Http\Controllers;

use Share;
use Exception;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Http\Requests\PostTableRequest;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:admin', ['except' => ['index', 'show']]);
        $this->middleware('permission:manage-all-content', ['except' => ['index', 'show']]);
    }

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
        $tags = Tag::select('*')->groupBy('id')->get();
        $categories = Category::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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
            'title' => ['required', 'unique:posts', 'max:255'],
            'content' => ['required', 'min:5'],
            'image_url' => ['image', 'mimes:png,jpg,jpeg,gif', 'sometimes'],
            'video_url' => ['url', 'string', 'sometimes'],
            'is_publish' => ['sometimes']
        ]);



        $title = $request->get('title');

        if ($request->hasFile('image_url')) {
            $name = $request->file('image_url')->getClientOriginalName();
            $imageUrl = $request->file('image_url')->storeAs('images', $name, 'public');
            // $path = Storage::url('public/images/' . $imageUrl);
        }
        if ($request->get('video_url')) {
            $videoUrl = $request->get('video_url');
        }

        Post::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $request->get('content'),
            'category_id' => $request->get('category_id'),
            'image_url' => $imageUrl,
            'video_url' => $request->get('video_url') ? $request->get('video_url') : null,
            'user_id' => auth()->user()->id,
            'is_published' => $request->get('is_published') ? 1 : 0
        ]);

        return redirect()->route('posts.index')->with('success', 'Article créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {


        $currentUrl = url()->current();
        // Social button



        // getting all
        $post = Post::where('slug', $param)
            ->orWhere('id', $param)
            ->with('tags', 'comments', 'user', 'category')
            ->get();
        // dd($post[0]->title);
        //Posts that have the same category
        $socialButtons = Share::page($currentUrl, $post[0]->title)
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->telegram()
            ->getRawLinks();
        // dd($socialButtons['facebook']);
        if ($post) {

            $otherCategoryPosts = Post::where('category_id', '=', $post[0]->category->id)
                ->where('title', '!=', $post[0]->title)
                ->with('tags', 'comments', 'user')
                ->get();
        }
        return view('posts.show', compact('post', 'otherCategoryPosts', 'currentUrl', 'socialButtons'));
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
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
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
        $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'content' => ['required', 'min:5'],
            'image_url' => ['image', 'mimes:png,jpg,jpeg,gif', 'sometimes'],
            'video_url' => ['url', 'string', 'sometimes'],
            'is_publish' => ['sometimes']
        ]);
        $postToUpdate = Post::find($post->id);
        if ($request->file('image_url')) {
            $name = $request->file('image_url')->getClientOriginalName();
            $imageUrl = $request->file('image_url')->storeAs('images', $name, 'public');
            // $path = Storage::url('public/images/' . $imageUrl);
            $postToUpdate->udpate([
                'image_url' => $imageUrl
            ]);
        }
        if ($request->get('video_url')) {
            $videoUrl = $request->get('video_url');
            $postToUpdate->udpate([
                'video_url' => $videoUrl
            ]);
        }
        if ($request->get('is_published')) {
            $postToUpdate->update([
                'is_published' => $request->get('is_published')
            ]);
        }
        $title = $request->get('title');
        $postToUpdate->update([
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $request->get('content'),
        ]);


        $postToUpdate->save();

        return redirect()->route('posts.index')->with('success', 'Article modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::find($id)->delete();
        return redirect()->route('posts.index')
            ->with('success', 'Article bien supprimé ');
    }
}

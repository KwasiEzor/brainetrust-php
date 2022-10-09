<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //

    public function index()
    {

        $recentPosts = Post::with('category', 'tags', 'user')->latest()->limit(3)->get();
        // dd($recentPosts);
        return view('home-page', compact('recentPosts'));
    }
}

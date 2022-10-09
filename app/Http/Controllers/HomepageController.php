<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Post;
use App\Models\Agenda;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    //

    public function index()
    {
        $date = Carbon::now();

        $upcomingAgendas = Agenda::whereDate('event_date', ' >= ', $date)
            ->limit(5)
            ->get();
        // dd($upcomingAgendas);
        $recentPosts = Post::with('category', 'tags', 'user')->latest()->limit(3)->get();
        // dd($recentPosts);
        return view('home-page', compact('recentPosts', 'upcomingAgendas'));
    }
}

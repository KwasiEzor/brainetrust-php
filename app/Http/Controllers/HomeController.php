<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userGameScores = [];
        $userScorePercentages = [];
        $userData = User::with(
            [
                'posts',
                'sc_games',
                'gm_results' => [
                    'sc_game'
                ],
                'user_info',
                'comments'
            ]
        )
            ->where('id', Auth()->user()->id)
            ->get();
        // dd($userData);

        foreach ($userData[0]->gm_results as $key => $result) {
            $userGameScores[] .= $result->player_top;
            $userScorePercentages[] .= number_format(($result->player_top * 100) / $result->game_top, 2);
        }
        // dd($userGameScores);
        return view('home', compact('userData', 'userGameScores', 'userScorePercentages'));
    }
}

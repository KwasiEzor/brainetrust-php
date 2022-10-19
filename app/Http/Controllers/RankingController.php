<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\GmResult;
use Database\Seeders\GmResultSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    //

    public function index()
    {
        $userGameScores = [];
        $userScorePercentages = [];


        // $userData = GmResult::with(
        //     [
        //         'user' => function ($query) {
        //             $query->withMax('gm_results', 'player_top')
        //                 ->withMin('gm_results', 'player_top')
        //                 ->groupBy('users.id');
        //         }
        //     ]
        // )->withCount('user as player_games')
        //     ->get();

        // =====================================

        // $userData = DB::table('gm_results')
        $userData = User::with(
            [
                'gm_results' => function ($query) {
                    $query->select(DB::raw('gm_results.user_id,MAX(player_top) as player_max, MIN(player_top) as player_min'))
                        ->whereRaw('gm_results.player_top is not NULL')
                        ->join('users', 'users.id', '=', 'gm_results.user_id')
                        ->groupBy('gm_results.user_id')
                        ->orderBy('gm_results.user_id')
                        ->withCount('user');
                }
            ]
        )

            ->get();

        // =====================================
        // $userData = User::addSelect([
        //     'user_results' => GmResult::selectRaw('user_id, MAX(player_top) as player_max,MIN(player_top) as player_min')
        //         ->whereColumn('gm_results.user_id', 'users.id')
        //         ->groupBy('gm_results.user_id')
        //         ->orderBy('gm_results.user_id')
        // ])
        //     ->get();

        // dd($userData);
        // dd($userData[0]->gm_results);


        // foreach ($userData as $key => $result) {
        //     $userGameScores[] .= $result->player_top;
        //     $userScorePercentages[] .= number_format(($result->player_top * 100) / $result->game_top, 2);
        // }
        // dd(max($userGameScores), min($userGameScores));
        return view('rankings.index', compact('userData'));
    }
}

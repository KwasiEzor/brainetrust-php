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
        $authUser = User::with(
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
        // dd($authUser);

        foreach ($authUser[0]->gm_results as $key => $result) {
            $userGameScores[] .= $result->player_top;
            $userScorePercentages[] .= number_format(($result->player_top * 100) / $result->game_top, 2);
        }
        // dd($userGameScores);
        return view('home', compact('authUser', 'userGameScores', 'userScorePercentages'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)
            ->get();
        // $user->update($request->only(['name', 'email']));
        dd($user);
        // dd($request->all());
        if ($request->hasFile('profile_img')) {

            $name = time() . '_' . $request->file('profile_img')->getClientOriginalName();
            $profileImg = $request->file('profile_img')->storeAs('images', $name, 'public');

            $user->update([
                'profile_img' => $profileImg
            ]);
        }

        $user->save();

        return redirect()->back()->with('success', 'Modification réussie');
    }
}

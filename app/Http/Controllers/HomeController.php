<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Traits\GlobalTrait;

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

    public function update(Request $request,  $id)
    {
        $userToUpdate = User::findOrFail($id);
        // dd($userToUpdate);
        // $profileImg = null;
        // dd($request->all());

        if ($request->file('profile_img')) {

            $filename =  $request->file('profile_img')->getClientOriginalName();
            $profileImg = $request->file('profile_img')->storeAs('images', $filename, 'public');
            $userToUpdate->update([
                'profile_img' =>  $profileImg
            ]);
        }

        // // dd($profileImg);
        if ($request->get('name') || $request->get('email')) {

            $userToUpdate->update([
                'name' => $request->get('name') ?? $request->name,
                'email' => $request->get('email') ?? $request->email,
            ]);
        }

        if (
            $request->input('birthday') |
            $request->input('address') |
            $request->input('city') |
            $request->input('zip_code') |
            $request->input('phone')
        ) {
            UserInfo::create([
                'birthday' => Carbon::parse($request->input('birthday')),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'zip_code' => $request->input('zip_code'),
                'phone' => $request->input('phone'),
                'user_id' => $userToUpdate->id
            ]);
        }
        $userToUpdate->save();
        return redirect()->back()->with('success', 'Modification réussie');
    }
}

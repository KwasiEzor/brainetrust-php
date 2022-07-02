<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Interclub;
use Illuminate\Http\Request;

class InterclubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $receiverTeam = $request->get('receiver-team');
        $visitorTeam = $request->get('visitor-team');
        $playerSerie = $request->get('player-serie');
        $matchDate = $request->get('match-date');

        $searchKeywords = $request->get('query');
        // dd($searchKeywords);
        if (!empty($searchKeywords)) {
            $interclubs = Interclub::with('receiver_team', 'visitor_team')
                ->where('receiver_team_id', 'like', '%' . $searchKeywords . '%')
                ->orWhere('visitor_team_id', 'like', '%' . $searchKeywords . '%')
                ->orWhere('player_serie_id', 'like', '%' . $searchKeywords . '%')
                ->orWhere('match_date', 'like', '%' . $searchKeywords . '%')
                ->latest()
                ->paginate(9);
            $interclubs->appends(['query' => $searchKeywords]);
        } else 
        if (
            isset($receiverTeam) && $receiverTeam != null ||
            isset($visitorTeam) && $visitorTeam != null ||
            isset($playerSerie) && $playerSerie != null ||
            isset($matchDate) && $matchDate != null
        ) {
            $interclubs = Interclub::with('receiver_team', 'visitor_team')
                ->where('receiver_team_id', $receiverTeam)
                ->orWhere('visitor_team_id', $visitorTeam)
                ->orWhere('player_serie_id', $playerSerie)
                ->orWhere('match_date', $matchDate)
                ->latest()
                ->paginate(9);
        } else {

            $interclubs = Interclub::with('receiver_team', 'visitor_team')
                ->latest()
                ->paginate(9);
        }

        return view('interclubs.index', compact('interclubs'));
    }

    public function fetchClubById($id)
    {
        $club = Club::where('id', $id)->get();

        return $club->toJSON();
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
     * @param  \App\Models\Interclub  $interclub
     * @return \Illuminate\Http\Response
     */
    public function show(Interclub $interclub)
    {
        //
        $interclub = Interclub::with('receiver_team', 'visitor_team')
            ->where('id', $interclub->id)
            ->get();
        return view('interclubs.show', compact('interclub'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interclub  $interclub
     * @return \Illuminate\Http\Response
     */
    public function edit(Interclub $interclub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interclub  $interclub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Interclub $interclub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interclub  $interclub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interclub $interclub)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\ScGame;
use Illuminate\Http\Request;

class ScGameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {

        if ($request->has('query') && $request->has('query') !== '') {
            $keywords = $request->input('query');
            $scgames = ScGame::query()
                ->with('gm_rounds', 'gm_results')
                ->where('competition', 'like', '%' . $keywords . '%')
                ->orWhere('comments', 'like', '%' . $keywords . '%')
                ->orWhere('created_at', 'like', '%' . $keywords . '%')
                ->latest()
                ->paginate(6);

            $scgames->appends(['query' => $keywords]);
        } else {
            $scgames = ScGame::query()
                ->with('gm_rounds', 'gm_results')
                ->latest()
                ->paginate(6);
        }
        //


        return view('scgames.index', compact('scgames'));
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
     * @param  \App\Models\ScGame  $scGame
     * @return \Illuminate\Http\Response
     */
    public function show(ScGame $scGame)
    {
        //
        $scGame = ScGame::where('id', $scGame->id)
            ->with('gm_rounds', 'gm_results')
            ->get();
        $gmTotal = ScGame::withSum('gm_rounds', 'gm_rounds.top_points')->get();

        return view('scgames.show', compact('scGame', 'gmTotal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScGame  $scGame
     * @return \Illuminate\Http\Response
     */
    public function edit(ScGame $scGame)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScGame  $scGame
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScGame $scGame)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScGame  $scGame
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScGame $scGame)
    {
        //
    }
}

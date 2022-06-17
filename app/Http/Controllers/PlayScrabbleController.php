<?php

namespace App\Http\Controllers;

use App\Models\PlayScrabble;
use App\Models\ScrabbleType;
use Illuminate\Http\Request;

class PlayScrabbleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $scrabbleData = PlayScrabble::all();

        $scrabbleTypes = ScrabbleType::all();

        return view('scrabble.index', compact('scrabbleData', 'scrabbleTypes'));
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
     * @param  \App\Models\PlayScrabble  $playScrabble
     * @return \Illuminate\Http\Response
     */
    public function show(PlayScrabble $playScrabble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayScrabble  $playScrabble
     * @return \Illuminate\Http\Response
     */
    public function edit(PlayScrabble $playScrabble)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PlayScrabble  $playScrabble
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlayScrabble $playScrabble)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayScrabble  $playScrabble
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayScrabble $playScrabble)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AboutClub;
use Illuminate\Http\Request;

class AboutClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $aboutData = AboutClub::all();

        return view('about.index', compact('aboutData'));
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
     * @param  \App\Models\AboutClub  $aboutClub
     * @return \Illuminate\Http\Response
     */
    public function show(AboutClub $aboutClub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutClub  $aboutClub
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutClub $aboutClub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutClub  $aboutClub
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutClub $aboutClub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutClub  $aboutClub
     * @return \Illuminate\Http\Response
     */
    public function destroy(AboutClub $aboutClub)
    {
        //
    }
}

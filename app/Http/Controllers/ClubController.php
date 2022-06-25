<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ClubController extends Controller
{

    public function getClubsData()
    {
        $clubs = Club::all();

        return $clubs->toJSON();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get all clubs

        $clubName = $request->get('name');
        $clubAddress = $request->get('address');
        $clubLocality = $request->get('locality');
        $searchKeywords = $request->get('search');

        if (!empty($searchKeywords)) {
            $clubs = Club::query()
                ->where('name', 'like', '%' . $searchKeywords . '%')
                ->orWhere('address', 'like', '%' . $searchKeywords . '%')
                ->orWhere('locality', 'like', '%' . $searchKeywords . '%')
                ->orWhere('province', 'like', '%' . $searchKeywords . '%')
                ->latest()
                ->paginate(10);
        } else if (!empty($clubAddress)  || !empty($clubLocality)  || !empty($clubName)) {
            $clubs = Club::query()
                ->where('name', $clubName)
                ->orWhere('address', $clubAddress)
                ->orWhere('locality', $clubLocality)
                ->latest()
                ->paginate(10);
        } else {

            $clubs  = Club::query()
                ->latest()
                ->paginate(10);
        }

        return view('clubs.index', compact('clubs'));
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
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $club = Club::find($id);
        // dd($club);

        return $club->toJSON();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit(Club $club)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy(Club $club)
    {
        //
    }
}

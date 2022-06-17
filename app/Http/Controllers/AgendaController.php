<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PlayerCategory;
use App\Models\PlayerSerie;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd($request);
        $categories = PlayerCategory::all();
        $series = PlayerSerie::all();
        $competitionTerm = $request->get('competition');
        $categoryTerm = $request->get('category');
        $serieTerm = $request->get('serie');
        $searchKeywords = $request->get('search');
        if (!empty($searchKeywords)) {
            $agendas = Agenda::query()
                ->Where('competition', 'like', '%' . $searchKeywords . '%')
                ->orWhere('event_date', 'like', '%' . $searchKeywords . '%')
                ->orWhere('event_time', 'like', '%' . $searchKeywords . '%')
                ->orWhere('player_category_id', 'like', '%' . $searchKeywords . '%')
                ->orWhere('player_serie_id', 'like', '%' . $searchKeywords . '%')
                ->latest()
                ->paginate(9);
        } else
        if (!empty($competitionTerm)  || !empty($categoryTerm) || !empty($serieTerm)) {

            $agendas = Agenda::query()
                ->where('competition', $competitionTerm)
                ->orWhere('player_category_id', $categoryTerm)
                ->orWhere('player_serie_id', $serieTerm)
                ->latest()
                ->paginate(9);
        } else {
            $agendas = Agenda::query()
                ->latest()
                ->paginate(9);
        }



        return view('agendas.index', compact('agendas', 'categories', 'series'));
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
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        //
    }
}

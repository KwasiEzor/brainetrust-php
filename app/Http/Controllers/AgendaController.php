<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PlayerCategory;
use App\Models\PlayerSerie;
use Carbon\Carbon;
use ProtoneMedia\LaravelCrossEloquentSearch\Search;

class AgendaController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:manage-all-content', ['except' => ['index', 'show']]);
    }
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
        $agendasQuery = Agenda::query();
        $date = Carbon::now();
        $agendasQuery->whereDate('event_date', '>=', $date);



        if (!empty($searchKeywords)) {
            $agendas =  $agendasQuery->with(['player_category', 'player_serie'])
                ->Where('competition', 'like', '%' . $searchKeywords . '%')
                ->orWhere('event_date', 'like', '%' . $searchKeywords . '%')
                // ->orWhere('player_category_id', 'like', '%' . $searchKeywords . '%')
                // ->orWhere('player_serie_id', 'like', '%' . $searchKeywords . '%')
                ->paginate(9);
            $agendas->appends(['search' => $searchKeywords]);
        } else
            //     if (!empty($competitionTerm)  && !empty($categoryTerm) && !empty($serieTerm)) {

            //     $agendas = $agendasQuery->with(['player_category', 'player_serie'])
            //         ->where('competition', $competitionTerm)
            //         ->where('player_category_id', $categoryTerm)
            //         ->where('player_serie_id', $serieTerm)
            //         ->paginate(9);
            //     $agendas->appends(['search' => $searchKeywords]);
            // } else

            if (!empty($competitionTerm)  || !empty($categoryTerm) || !empty($serieTerm)) {

                $agendas = $agendasQuery->with(['player_category', 'player_serie'])
                    ->where('competition', $competitionTerm)
                    ->orwhere('player_category_id', $categoryTerm)
                    ->orwhere('player_serie_id', $serieTerm)
                    ->paginate(9);
                $agendas->appends(['search' => $searchKeywords]);
            } else {
                $agendas = $agendasQuery->with(['player_category', 'player_serie'])
                    // ->latest()
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

        $categories = PlayerCategory::all();
        $series = PlayerSerie::all();
        return view('admin.agendas.create', compact('categories', 'series'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->validate(
            [
                'event_date' => ['required'],
                'competition' => ['required', 'string', 'min:5'],
                'competition_round' => ['required', 'numeric'],
                'minute_per_round' => ['required', 'numeric'],
                'player_category_id' => ['nullable', 'numeric'],
                'player_serie_id' => ['nullable', 'numeric'],

            ]
        );




        // dd($data);
        if ($request->get('is_highlighted')) {

            $agenda = Agenda::create($data, [
                'is_higlighted' => $request->get('is_highlighted') ? 1 : 0
            ]);
        } else {
            $agenda = Agenda::create($data);
        }
        // dd($agenda);
        if (!$agenda) {
            return back()->with('message', 'error to create agenda');
        }
        return to_route('agendas.index')->with('message', 'Agenda created successfully');
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
        $categories = PlayerCategory::all();
        $series = PlayerSerie::all();

        $agenda = Agenda::findOrFail($agenda->id);
        return view('admin.agendas.edit', compact('agenda', 'categories', 'series'));
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
        //
        $data = $request->validate(
            [
                'event_date' => ['required'],
                'competition' => ['required', 'string', 'min:5'],
                'competition_round' => ['nullable', 'numeric'],
                'minute_per_round' => ['nullable', 'numeric'],
                'player_category_id' => ['nullable', 'numeric'],
                'player_serie_id' => ['nullable', 'numeric'],

            ]
        );




        // dd($data);
        $agenda = Agenda::findOrFail($agenda->id);
        if ($request->get('is_highlighted')) {

            $agenda->update($data, [
                'event_date' => Carbon::parse($request->input('event_date')),
                'is_higlighted' => $request->has('is_highlighted') ? 1 : 0
            ]);
        } else {
            $agenda->update($data, [
                'event_date' => Carbon::parse($request->input('event_date'))
            ]);
        }
        if (!$agenda) {
            return back()->with('error', 'Problème lors de la mdoification');
        }
        return to_route('agendas.index')->with('success', 'Agenda modifié avec succès');
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
        $agenda = Agenda::findOrFail($agenda->id);
        $agenda->delete();
        return back()->with('success', 'Agenda supprimé');
    }
}

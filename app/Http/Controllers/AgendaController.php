<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\PlayerCategory;
use App\Models\PlayerSerie;
use Carbon\Carbon;

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
        if (!empty($searchKeywords)) {
            $agendas = Agenda::query()
                ->Where('competition', 'like', '%' . $searchKeywords . '%')
                ->orWhere('event_date', 'like', '%' . $searchKeywords . '%')
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
        //
        $request->validate(
            [
                'event_date' => ['required'],
                'competition' => ['required', 'string', 'min:5'],
                'competition_round' => ['required', 'numeric'],
                'minute_per_round' => ['required', 'numeric'],
                'player_category_id' => ['nullable', 'numeric'],
                'player_serie_id' => ['nullable', 'numeric'],
                'is_highlighted' => ['nullable', 'boolean']
            ]
        );



        $data = $request->only(
            [
                'event_date',
                'competition',
                'competition_round',
                'minute_per_round',
                'player_category_id',
                'player_serie_id',
            ]
        );
        // dd($data);
        $agenda = Agenda::create($data, [
            'is_higlighted' => $request->has('is_highlighted')
        ]);
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
        $request->validate(
            [
                'event_date' => ['required'],
                'competition' => ['required', 'string', 'min:5'],
                'competition_round' => ['nullable', 'numeric'],
                'minute_per_round' => ['nullable', 'numeric'],
                'player_category_id' => ['nullable', 'numeric'],
                'player_serie_id' => ['nullable', 'numeric'],
                'is_highlighted' => ['nullable', 'boolean']
            ]
        );



        $data = $request->only(
            [
                'event_date',
                'competition',
                'competition_round',
                'minute_per_round',
                'player_category_id',
                'player_serie_id',
            ]
        );
        // dd($data);
        $agenda = Agenda::findOrFail($agenda->id);
        $agenda->update($data, [
            'event_date' => Carbon::parse($request->input('event_date')),
            'is_higlighted' => $request->has('is_highlighted')
        ]);
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

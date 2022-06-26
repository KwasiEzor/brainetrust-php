@extends('layouts.app')

@section('content')
    <div class="container-xl">

        <div class="container ">
            <div class="row mb-5">
                <h2 class="page-title">Détails de la partie</h2>
            </div>
            <div class="row g-4">
               <div class="card border-0 p-4">
                <div class="card-header border-0">
                    <h3 class="card-title d-flex align-items-center justify-content-between"> 
                      <span>Partie jouée</span> <a href="{{route('scgames.index')}}">
                        <span>
                          <small>Retour <i class="bi bi-arrow-left-square-fill"></i></small>
                          <a href="{{route('files-export')}}" class="btn btn-success"><i class="bi bi-filetype-csv"></i> Export CSV</a>
                          {{-- <a href="{{route('pdf-export',$scGame[0]->id)}}" class="btn btn-primary">
                            <i class="bi bi-filetype-pdf"></i>
                            PDF
                          </a> --}}
                        </span>
                    </a> </h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">N°</th>
                            <th scope="col">Tirage</th>
                            <th scope="col">Place</th>
                            <th scope="col">Solution</th>
                            <th scope="col">Top</th>
                            <th scope="col">Commentaires</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($scGame[0]->gm_rounds as $round )
                                
                            <tr>
                              <th scope="row">{{$round->id}}</th>
                              <td>{{ $round->letters_selected }}</td>
                              <td>{{ $round->place }}</td>
                              <td class="text-primary">{{ $round->solution }}</td>
                              <td>{{ $round->top_points }}</td>
                              <td>{{ $round->comments }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                   </div>
                </div>
                <div class="card-footer">
                </div>
            </div>
            <div class="row g-4">
                <div class="card border-0 p-4">
                    <div class="card-header border-0">
                        <h3 class="card-title"> Classement </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th scope="col" class="text-center">N°</th>
                                <th scope="col">Joueurs</th>
                                <th scope="col" class="text-center">Points</th>
                                <th scope="col" class="text-center">Top Partie</th>
                                <th scope="col" class="text-center">Pourcentage</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($scGame[0]->gm_results as $result )
                                    
                                <tr>
                                  <td scope="row" class="text-center">{{$result->ranking_position}}</td>
                                  <td>{{$result->user->name}}</td>
                                  <td class="text-center  text-primary">{{$result->player_top}}</td>
                                  <td class="text-center">{{$result->game_top}}</td>
                                    <td class="text-center">{{number_format(($result->player_top * 100)/$result->game_top,2)}} % </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                       </div>
                    </div>
                </div>
            </div>
           
        </div>

    </div>
@endsection

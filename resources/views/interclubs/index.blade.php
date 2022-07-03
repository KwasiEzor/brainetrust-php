@extends('layouts.app')

@section('content')
    <div class="container-xl">
        {{-- {{dd($interclubDivisions)}} --}}
        <div class="container ">
            <div class="row">
                <div class="col-lg-8 col-md-auto mx-auto">
                    <h2 class="page__title text-center p-4">
                        <a href="{{route('interclubs.index')}}" class="page-title ">
                           Interclubs
                        </a>
                    </h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class=" col-md-12 col-sm-auto  mt-4 mb-0 mx-auto">
                    <form action="{{route('interclubs.index')}}" method="GET" role="search">
                        @csrf
                        {{-- <div class="input-group mb-3">
                            <input type="text" class="form-control bg-white p-3 border-0 shadow-sm"
                                placeholder="Enter keyword..." aria-label="query" aria-describedby="query" name="query"
                                id="query">
                            <button type="submit" class="input-group-text btn btn-outline-primary px-3 fs-4 shadow-sm"
                                id="search-btn"><i class="bi bi-search"></i></button>
                        </div> --}}
                        <div class="row">
                            <div class="col-md-3 col-sm-auto">
                                <div class="form-floating">
                                    <select class="form-select " id="floatingSelectGrid" name="receiver-team">
                                        <option selected ></option>
                                        @foreach ($interclubsData as $match )
                                            <option value="{{$match->receiver_team->id}}">
                                                {{$match->receiver_team->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Club Domicile</label>
                                  </div>
                            </div>
                            <div class="col-md-3 col-sm-auto">
                                <div class="form-floating">
                                    <select class="form-select " id="floatingSelectGrid" name="visitor-team">
                                        <option selected ></option>
                                        @foreach ($interclubsData as $match )
                                            <option value="{{$match->visitor_team->id}}">
                                                {{$match->visitor_team->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Club visiteur</label>
                                  </div>
                              
                            </div>
                            <div class="col-md-3 col-sm-auto ">
                                <div class="form-floating">
                                    <select class="form-select " id="floatingSelectGrid" name="player-serie">
                                        <option selected ></option>
                                        @foreach ($interclubDivisions as $interclubDivision )
                                            <option value="{{$interclubDivision->player_serie_id }}">
                                                {{$interclubDivision->player_serie_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Séries</label>
                                  </div>
                            </div>
                            <div class="col-md-3 col-sm-auto">
                                <div class="form-floating">
                                    <select class="form-select " id="floatingSelectGrid" name="match-date">
                                        <option selected ></option>
                                        @foreach ($interclubsData as $match )
                                            <option value="{{$match->match_date}}">
                                                {{$match->match_date}}
                                            </option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Date des rencontres</label>
                                  </div>
                              
                            </div>
                            
                        </div>
                        <div class="col-12 col-sm-auto d-flex align-items-center justify-content-center pt-3">
                            <button class="btn btn-primary btn-lg " id="agendaSearchBtn" type="submit">Recherche <i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row g-4">
                @forelse ($interclubs as $interclub)
                    <div class="col-lg-4 col-md-6 col-sm-auto shadow">
                        <div class="card border-0">
                            <img src="{{ asset('images/interclub.png') }}" alt="interclub image"
                                class="card-img img-fluid">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Interclub</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class=""><i class="bi bi-calendar-event-fill"></i>
                                    {{ $interclub->match_date }}</small>
                                <small> <span class="text-decoration-underline">Division</span>  : <span class="badge bg-secondary">{{$interclub->player_serie_id}}</span></small>
                            </div>
                            <div class=" card-body d-flex justify-content-between align-items-center py-3">
                                <div class="scrabble-club-box">
                                    
                                    <p>Domicile :</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $interclub->receiver_team->id }}">
                                        {{ $interclub->receiver_team->name }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop-{{ $interclub->receiver_team->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-uppercase" id="staticBackdropLabel">{{ $interclub->receiver_team->name}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Localité : <span class="fw-bold">{{ $interclub->receiver_team->locality }}</span></p>
                                                    <p>
                                                      Adresse :  {{ $interclub->receiver_team->address }}
                                                    </p>
                                                    <p>Province ou Région : {{ $interclub->receiver_team->province }}</p>
                                                    <p>Jour d'entrainement : {{ $interclub->receiver_team->training_day }} </p>
                                                    <p>Horaire: {{ $interclub->receiver_team->training_time }} </p>
                                                    <p>Personne de contact : <span class="fw-bold">{{ $interclub->receiver_team->contact_person }}</span> </p>
                                                    <p>Adresse email : 
                                                        <a href="mailto:{{ $interclub->receiver_team->email }}"> {{ $interclub->receiver_team->email }}</a>  
                                                    </p>
                                                    @if ($interclub->receiver_team->phone_number)
                                                        
                                                    <p>Tel. {{ $interclub->receiver_team->phone_number }}</p>
                                                    @endif
                                                    @if ($interclub->receiver_team->mobile_number)
                                                    <p>Tel. {{ $interclub->receiver_team->mobile_number }}</p>  
                                                    @endif
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal end --}}

                                </div>
                                <div class="scrabble-club-box">
                                    <p>Visiteur :</p>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-{{ $interclub->visitor_team->id }}">
                                        {{ $interclub->visitor_team->name }}
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop-{{ $interclub->visitor_team->id }}" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title text-uppercase text-center" id="staticBackdropLabel">{{ $interclub->visitor_team->name}}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Localité : <span class="fw-bold">{{ $interclub->visitor_team->locality }}</span></p>
                                                    <p>
                                                      Adresse :  {{ $interclub->visitor_team->address }}
                                                    </p>
                                                    <p>Province ou Région : {{ $interclub->visitor_team->province }}</p>
                                                    <p>Jour d'entrainement : {{ $interclub->visitor_team->training_day }} </p>
                                                    <p>Horaire: {{ $interclub->visitor_team->training_time }} </p>
                                                    <p>Personne de contact : <span class="fw-bold">{{ $interclub->visitor_team->contact_person }}</span> </p>
                                                    <p>Adresse email : 
                                                        <a href="mailto:{{ $interclub->visitor_team->email }}"> {{ $interclub->visitor_team->email }}</a>  
                                                    </p>
                                                    @if ($interclub->visitor_team->phone_number)
                                                        
                                                    <p>Tel. {{ $interclub->visitor_team->phone_number }}</p>
                                                    @endif
                                                    @if ($interclub->visitor_team->mobile_number)
                                                    <p>Tel. {{ $interclub->visitor_team->mobile_number }}</p>  
                                                    @endif
                                                    
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal end --}}
                                </div>
                                
                            </div>
                            <div class="p-2 d-flex align-items-center justify-content-end">
                                <a href="{{route('interclubs.show',$interclub)}}" class="btn text-primary">Voir détails <i class="bi bi-arrow-right-square-fill"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No data avaible</p>
                @endforelse
            </div>
            <div class="mx-auto my-4">
                {{ $interclubs->links() }}
            </div>
        </div>

    </div>
@endsection

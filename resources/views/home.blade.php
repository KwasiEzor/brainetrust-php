@extends('layouts.app')

@section('content')
    <div class="container-xl h-100">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-0">
                        <h3 class="card-header border-0 p-3 bg-white text-center fw-normal ">{{ __('Home Dashboard') }}</h3>
    
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
    
                            {{-- {{ __('You are logged in!') }} --}}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Content --}}
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                  <button class="nav-link" id="nav-article-tab" data-bs-toggle="tab" data-bs-target="#nav-article" type="button" role="tab" aria-controls="nav-article" aria-selected="false">Articles</button>
                  <button class="nav-link" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings" type="button" role="tab" aria-controls="nav-settings" aria-selected="false" >Settings</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                {{-- Home start --}}
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                    <div class="container">
                        <div class="row py-5">
                            <div class="col-lg-4 col-md-6 col-sm-auto">
                                <div class="card text-bg-primary mb-3">
                                    <div class="card-header border-0">Statistques</div>
                                    <div class="card-body">
                                      <h5 class="card-title">Primary card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-auto">
                                <div class="card text-bg-success mb-3">
                                    <div class="card-header border-0">Articles publiés</div>
                                    <div class="card-body">
                                      <h5 class="card-title">Primary card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-auto">
                                <div class="card text-bg-warning mb-3">
                                    <div class="card-header border-0">Commentaires</div>
                                    <div class="card-body">
                                      <h5 class="card-title">Points de vue</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row pb-5">
                            <div class="mb-3">
                                <h5>Résultats parties jouées</h5>
                            </div>
                            @forelse ($userData[0]->gm_results as $result)
                                        <div class="col-lg-4 col-md-6 col-sm-auto">
                                            <div class="card my-3 ">
                                                <div class="card-body">
                                                    <h5 class="card-title">Compétition :
                                                        {{ $result->sc_game->competition }}</h5>
                                                    <p>Rang : {{ $result->ranking_position }}</p>
                                                    <p>Cumul joueur : {{ $result->player_top }}</p>
                                                    <p>Top de partie : {{ $result->game_top }}</p>
                                                    <p>Pourcentage :
                                                        {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}
                                                        %</p>
                                                    <p>Date : {{ $result->created_at->format('d/m/Y') }}</p>
                                                    <a href="{{route('scgames.show',$result->sc_game)}}">Voir plus</a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-auto">
                                            Aucun resultat
                                        </div>
                                    @endforelse
                        </div>
                    </div>
                </div>
                {{-- Home end --}}
                {{-- Profile start --}}
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">

                    <div class="container">
                        <div class="row py-5">
                            <div class="col-lg-6 col-md-auto">
                                <div class="card">
                                    <h5 class="card-header border-0">Informations personnelles</h5>
                                    <div class="card-body">
                                        <ul class="list-group">     
                                            <li class="list-group-item border-0">Nom : {{$userData[0]->name}}</li>
                                            <li class="list-group-item border-0">Email : <a href="mailto:{{$userData[0]->email}}">{{$userData[0]->email}}</a> </li>
                                            <li class="list-group-item border-0">Date de naissance : {{$userData[0]->user_info->birthday}}</li>
                                            <li class="list-group-item border-0">Ville : {{$userData[0]->user_info->city}}</li>
                                            <li class="list-group-item border-0">Adresse : <address>{{$userData[0]->user_info->address}}</address> </li>
                                            <li class="list-group-item border-0">Code postal : {{$userData[0]->user_info->zip_code}}</li>
                                            <li class="list-group-item border-0">Contact : {{$userData[0]->user_info->phone}}</li>
                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Profile end --}}
                <div class="tab-pane fade" id="nav-article" role="tabpanel" aria-labelledby="nav-article-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab" tabindex="0">...</div>
              </div>
              
        </div>
    </div>
@endsection

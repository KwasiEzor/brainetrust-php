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
                                <div class="card text-bg-primary mb-3 h-100">
                                    <div class="card-header border-0">Statistques de jeu</div>
                                    <div class="card-body">
                                      <h5 class="card-title">D??tails</h5>
                                      <p class="card-text">Nb de parties jou??es : <span class="fw-bold text-primary fs-3">
                                        @if ($userData[0]->gm_results->count())
                                        {{$userData[0]->gm_results->count() }}
                                        @else
                                            0
                                        @endif
                                        </span> 
                                    </p>
                                      <p class="card-text">Meilleur score : <span class="fw-bold text-success fs-3">
                                        @if ($userGameScores)
                                        {{max($userGameScores) }}</span> <i class="bi bi-hand-thumbs-up-fill text-success"></i>
                                        @else
                                            0
                                        @endif
                                        
                                    </p>
                                      <p class="card-text">Meilleur pourcentage : <span class="fw-bold text-primary fs-3">
                                        @if ($userScorePercentages)
                                            
                                        {{max($userScorePercentages) }} %</span>  <i class="bi bi-check2-circle text-primary"></i>
                                        @else
                                            0%
                                        @endif
                                    </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-auto">
                                <div class="card text-bg-success mb-3 h-100">
                                    <div class="card-header border-0">Articles publi??s</div>
                                    <div class="card-body">
                                      <h5 class="card-title">D??tails</h5>
                                      <p class="card-text">Nb d'articles : <span class="fw-bold text-primary fs-3">
                                        @if ($userData[0]->posts->count())
                                            {{$userData[0]->posts->count()}}
                                        @else
                                            0
                                        @endif
                                    </span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-auto">
                                <div class="card text-bg-warning mb-3 h-100">
                                    <div class="card-header border-0">Commentaires</div>
                                    <div class="card-body">
                                      <h5 class="card-title">D??tails</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row pb-5">
                            <div class="mb-3">
                                <h5>R??sultats parties jou??es</h5>
                            </div>
                            @forelse ($userData[0]->gm_results as $result)
                                        <div class="col-lg-4 col-md-6 col-sm-auto">
                                            <div class="card my-3 ">
                                                <div class="card-body">
                                                    <h5 class="card-title">Comp??tition :
                                                        {{ $result->sc_game->competition }}</h5>
                                                    <p>Rang : 
                                                        <button class="btn btn-warning">
                                                            {{ $result->ranking_position }}
                                                        </button>
                                                    </p>
                                                    <p>Cumul joueur : 
                                                        <span class="badge bg-secondary">
                                                            {{ $result->player_top  }}
                                                        </span>
                                                    </p>
                                                    <p>Top de partie : 
                                                        <span class="badge bg-primary">
                                                            {{ $result->game_top }}
                                                        </span>
                                                    </p>
                                                    <p>Pourcentage :
                                                        {{-- {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}
                                                        % --}}
                                                    </p>
                                                    @if (number_format(($result->player_top * 100) / $result->game_top, 2) >= 80)
                                                        
                                                    <div class="progress mb-3">
                                                        <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%</div>
                                                    </div>
                                                    @endif
                                                    @if (number_format(($result->player_top * 100) / $result->game_top, 2) < 80 && number_format(($result->player_top * 100) / $result->game_top, 2) >= 70 )
                                                        
                                                    <div class="progress mb-3">
                                                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%</div>
                                                    </div>
                                                    @endif
                                                    @if (number_format(($result->player_top * 100) / $result->game_top, 2) < 70 && number_format(($result->player_top * 100) / $result->game_top, 2) >= 50 )
                                                        
                                                    <div class="progress mb-3">
                                                        <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%</div>
                                                    </div>
                                                    @endif
                                                    @if (number_format(($result->player_top * 100) / $result->game_top, 2) < 50 )
                                                        
                                                    <div class="progress mb-3">
                                                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" role="progressbar" style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%</div>
                                                    </div>
                                                    @endif
                                                    
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
                                            <li class="list-group-item border-0">Date de naissance : 
                                                @if ($userData[0]->user_info)
                                                    
                                                {{$userData[0]->user_info->birthday}}
                                                @else
                                                    <span>N??ant</span>
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0">Ville : 
                                                @if ($userData[0]->user_info)
                                                    
                                                {{$userData[0]->user_info->city}}
                                                @else
                                                    <span>N??ant</span>
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0">Adresse : 
                                                @if ($userData[0]->user_info)
                                                    
                                                <address>
                                                    {{$userData[0]->user_info->address}}
                                                </address> 
                                                @else
                                                    <span>N??ant</span>
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0">Code postal :
                                                @if ($userData[0]->user_info)
                                                    
                                                {{$userData[0]->user_info->zip_code}}
                                                @else
                                                    <span>N??ant</span>
                                                @endif
                                                
                                                </li>
                                            <li class="list-group-item border-0">Contact : 
                                                @if ($userData[0]->user_info)
                                                    
                                                {{$userData[0]->user_info->phone}}
                                                @else
                                                    <span>N??ant</span>
                                                @endif
                                            </li>
                                          
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-auto">
                                <div class="card d-flex align-items-center justify-content-center h-100 ">
                                    <div class="card-header border-0">
                                        Image de profil
                                    </div>
                                    <img src="
                                    @if ($userData[0]->profile_img)
                                    {{$userData[0]->profile_img}}
                                    @else
                                        {{asset('images/default-user.png')}}
                                    @endif
                                    " alt="image" class="card-img img-fluid"
                                    style="with:100%; max-width:20rem;"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Profile end --}}
                <div class="tab-pane fade" id="nav-article" role="tabpanel" aria-labelledby="nav-article-tab" tabindex="0">

                    <div class="container">
                        <div class="row py-5">
                            @forelse ($userData[0]->posts as $post )
                                <div class="col-lg-4 col-md-6 col-sm-auto">
                                    <div class="card h-100">
                                        <img src="{{ $post->image_url }}" class="img-fluid card-img mb-3" alt="image">
                                        <div class="card-body">
                                            <h4 class="card-title text-primary">{{$post->title}}</h4>
                                            <small class="pe-3"> Cat??gorie : <span class="badge bg-success">{{$post->category->name}}</span> </small>
                                            <p class="card-text p-3 bg-light">
                                                {{ Str::limit($post->content, 120) }}
                                            </p>
                                        </div>
                                        <div class=" p-3 d-flex justify-content-end ">
                                            <a href="{{ route('posts.show', $post->slug) }}"
                                                class="btn btn-outline-primary ">Voir
                                                plus</a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>Aucun article</p>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab" tabindex="0">...</div>
              </div>
              
        </div>
    </div>
@endsection

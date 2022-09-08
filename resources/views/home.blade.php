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
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">Home</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</button>
                    <button class="nav-link" id="nav-article-tab" data-bs-toggle="tab" data-bs-target="#nav-article"
                        type="button" role="tab" aria-controls="nav-article" aria-selected="false">Articles</button>
                    <button class="nav-link" id="nav-settings-tab" data-bs-toggle="tab" data-bs-target="#nav-settings"
                        type="button" role="tab" aria-controls="nav-settings" aria-selected="false">Settings</button>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                {{-- Home start --}}
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                    tabindex="0">
                    <div class="container">
                        <div class="row py-5">
                            <div class="col-lg-4 col-md-6 col-sm-auto">
                                <div class="card text-bg-primary mb-3 h-100">
                                    <div class="card-header border-0">Statistques de jeu</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Détails</h5>
                                        <p class="card-text">Nb de parties jouées : <span class="fw-bold text-primary fs-3">
                                                @if ($authUser[0]->gm_results->count())
                                                    {{ $authUser[0]->gm_results->count() }}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                        </p>
                                        <p class="card-text">Meilleur score : <span class="fw-bold text-success fs-3">
                                                @if ($userGameScores)
                                                    {{ max($userGameScores) }}
                                            </span> <i class="bi bi-hand-thumbs-up-fill text-success"></i>
                                        @else
                                            0
                                            @endif

                                        </p>
                                        <p class="card-text">Meilleur pourcentage : <span class="fw-bold text-primary fs-3">
                                                @if ($userScorePercentages)
                                                    {{ max($userScorePercentages) }} %
                                            </span> <i class="bi bi-check2-circle text-primary"></i>
                                        @else
                                            0%
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-auto">
                                <div class="card text-bg-success mb-3 h-100">
                                    <div class="card-header border-0">Articles publiés</div>
                                    <div class="card-body">
                                        <h5 class="card-title">Détails</h5>
                                        <p class="card-text">Nb d'articles : <span class="fw-bold text-primary fs-3">
                                                @if ($authUser[0]->posts->count())
                                                    {{ $authUser[0]->posts->count() }}
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
                                        <h5 class="card-title">Détails</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row pb-5">
                            <div class="mb-3">
                                <h5>Résultats parties jouées</h5>
                            </div>
                            @forelse ($authUser[0]->gm_results as $result)
                                <div class="col-lg-4 col-md-6 col-sm-auto">
                                    <div class="card my-3 ">
                                        <div class="card-body">
                                            <h5 class="card-title">Compétition :
                                                {{ $result->sc_game->competition }}</h5>
                                            <p>Rang :
                                                <button class="btn btn-warning">
                                                    {{ $result->ranking_position }}
                                                </button>
                                            </p>
                                            <p>Cumul joueur :
                                                <span class="badge bg-secondary">
                                                    {{ $result->player_top }}
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
                                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated"
                                                        role="progressbar"
                                                        style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%
                                                    </div>
                                                </div>
                                            @endif
                                            @if (number_format(($result->player_top * 100) / $result->game_top, 2) < 80 &&
                                                number_format(($result->player_top * 100) / $result->game_top, 2) >= 70)
                                                <div class="progress mb-3">
                                                    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated"
                                                        role="progressbar"
                                                        style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%
                                                    </div>
                                                </div>
                                            @endif
                                            @if (number_format(($result->player_top * 100) / $result->game_top, 2) < 70 &&
                                                number_format(($result->player_top * 100) / $result->game_top, 2) >= 50)
                                                <div class="progress mb-3">
                                                    <div class="progress-bar bg-warning progress-bar-striped progress-bar-animated"
                                                        role="progressbar"
                                                        style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%
                                                    </div>
                                                </div>
                                            @endif
                                            @if (number_format(($result->player_top * 100) / $result->game_top, 2) < 50)
                                                <div class="progress mb-3">
                                                    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated"
                                                        role="progressbar"
                                                        style="width: {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%;"
                                                        aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                        {{ number_format(($result->player_top * 100) / $result->game_top, 2) }}%
                                                    </div>
                                                </div>
                                            @endif

                                            <p>Date : {{ $result->created_at->format('d/m/Y') }}</p>
                                            <a href="{{ route('scgames.show', $result->sc_game) }}">Voir plus</a>
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
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                    tabindex="0">

                    <div class="container">
                        <div class="row py-5">
                            <div class="col-lg-6 col-md-auto">
                                <div class="card">
                                    <h5 class="card-header border-0">Informations personnelles</h5>
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item border-0">Nom : {{ $authUser[0]->name }}</li>
                                            <li class="list-group-item border-0">Email : <a
                                                    href="mailto:{{ $authUser[0]->email }}">{{ $authUser[0]->email }}</a>
                                            </li>
                                            <li class="list-group-item border-0">Date de naissance :
                                                @if ($authUser[0]->user_info)
                                                    {{ $authUser[0]->user_info->birthday }}
                                                @else
                                                    <span>Néant</span>
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0">Ville :
                                                @if ($authUser[0]->user_info)
                                                    {{ $authUser[0]->user_info->city }}
                                                @else
                                                    <span>Néant</span>
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0">Adresse :
                                                @if ($authUser[0]->user_info)
                                                    <address>
                                                        {{ $authUser[0]->user_info->address }}
                                                    </address>
                                                @else
                                                    <span>Néant</span>
                                                @endif
                                            </li>
                                            <li class="list-group-item border-0">Code postal :
                                                @if ($authUser[0]->user_info)
                                                    {{ $authUser[0]->user_info->zip_code }}
                                                @else
                                                    <span>Néant</span>
                                                @endif

                                            </li>
                                            <li class="list-group-item border-0">Contact :
                                                @if ($authUser[0]->user_info)
                                                    {{ $authUser[0]->user_info->phone }}
                                                @else
                                                    <span>Néant</span>
                                                @endif
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-auto">
                                <div class="card d-flex align-items-center justify-content-center h-100 ">
                                    {{-- <div class="card-header border-0">
                                        Image de profil
                                    </div> --}}
                                    <img src="
                                    @if ($authUser[0]->profile_img) 
                                    {{ $authUser[0]->profile_img }}
                                    @else
                                        {{ asset('images/default-user.png') }} 
                                    @endif
                                    "
                                        alt="image" class="card-img img-fluid" style="with:100%; max-width:20rem;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Profile end --}}
                <div class="tab-pane fade" id="nav-article" role="tabpanel" aria-labelledby="nav-article-tab"
                    tabindex="0">

                    <div class="container">
                        <div class="row py-5">
                            @forelse ($authUser[0]->posts as $post)
                                <div class="col-lg-4 col-md-6 col-sm-auto">
                                    <div class="card h-100">
                                        <img src="{{ $post->image_url }}" class="img-fluid card-img mb-3"
                                            alt="image">
                                        <div class="card-body">
                                            <h4 class="card-title text-primary">{{ $post->title }}</h4>
                                            <small class="pe-3"> Catégorie : <span
                                                    class="badge bg-success">{{ $post->category->name }}</span> </small>
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
                <div class="tab-pane fade" id="nav-settings" role="tabpanel" aria-labelledby="nav-settings-tab"
                    tabindex="0">

                    <div class="container py-4 px-3">
                        <div class="card">
                            <div class="card-header border-0 p-3">
                                <h5>Données personnelles</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('home.update-user',$authUser[0]->id)}}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-6 mx-auto">
                                            <div class="profile_img d-flex align-items-center justify-content-center ">
                                                <figure class="figure">
                                                    <img class="figure-img img-fluid rounded" 
                                                    src="
                                                        @if ($authUser[0]->profile_img) {{ $authUser[0]->profile_img }}
                                                        @else
                                                        {{ asset('images/default-user.png') }} 
                                                        @endif
                                                        "
                                                        alt="image" class="card-img img-fluid"
                                                        style="with:100%; max-width:20rem;">
                                                    <figcaption class="figure-caption text-center">{{ $authUser[0]->name }}
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="form-group">
                                                {{-- <label for="profile_img">Image de profil</label> --}}
                                                <input type="file" name="profile_img" id="" accept=""
                                                    value="{{ $authUser[0]->profile_img }}" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-auto">
                                            <div class="form-group">
                                                <label for="name" class="mb-2">Nom et prénoms</label>
                                                <input type="text" id="name" value="{{ $authUser[0]->name }}" placeholder=""
                                                    name="name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-auto">
                                            <div class="form-group">
                                                <label for="email" class="mb-2">Email</label>
                                                <input type="email" id="email" value="{{ $authUser[0]->email }}" placeholder=""
                                                    name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 col-sm-auto">
                                            <div class="form-group">
                                                <label for="birthday" class="mb-2">Date de naissance</label>
                                                <input type="date" id="birthday" value="" placeholder="Date de naissance"
                                                    name="birthday" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-auto">
                                            <div class="form-group">
                                                <label for="address" class="mb-2">Adresse</label>
                                                <input type="text" value="" id="address" placeholder="Adresse complète"
                                                    name="address" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-lg-4 col-md-6 col-sm-auto">
                                            <div class="form-group">
                                                <label for="city" class="mb-2">Ville</label>
                                                <input type="text" id="city" name="city" value="" placeholder="Ville"
                                                     class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-auto">
                                            <div class="form-group">
                                                <label for="zip_code" class="mb-2">Code postal</label>
                                                <input type="text" value="" id="zip_code" placeholder="Code postal"
                                                    name="zip_code" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6 col-sm-auto">
                                            <div class="form-group">
                                                <label for="phone" class="mb-2">Téléphone</label>
                                                <input type="text" value="" id="phone" placeholder="Numéro de téléphone"
                                                    name="phone" class="form-control">
                                            </div>
                                        </div>
                                        {{-- <div class="form-group my-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="flexRadioDefault" id="flexRadioDefault1">
                                                <label class="form-check-label" for="flexRadioDefault1">
                                                  Est membre
                                                </label>
                                              </div>
                                              
                                        </div> --}}
                                        <div class="form-group my-3 d-flex align-items-center justify-content-center">
                                            <input type="submit" class="btn btn-success" value="Modifier données">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

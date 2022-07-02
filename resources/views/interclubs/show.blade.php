@extends('layouts.app')
@section('content')
    <div class="container-xl py-5 h-100">
        <div class="container">
            <div class="row mb-4">
                <h2 class="page-title">Détails Interclub</h2>
            </div>
            <div class="row">
                <div class="col-12 p-3 d-flex align-items-center justify-content-end">
                    <a href="{{route('interclubs.index')}}">Retour à la page Interclubs <i class="bi bi-arrow-left-square-fill"></i></a>
                </div>
            </div>
            <div class="row ">
                <div class="card border-0 shadow-sm p-3">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-lg-6 col-md-auto">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h3 class="card-title mb-4">
                                            <span class="badge bg-primary text-uppercase text-shadow">
                                                {{ $interclub[0]->receiver_team->name }}
                                            </span>
                                        </h3>
                                        <div class="card-text bg-light px-3 py-4 rounded">
                                            <p><i class="bi bi-calendar-check-fill"></i> Date de la rencontre :
                                                <span>{{ $interclub[0]->match_date }}</span>
                                            </p>
                                            <p>Score : <span
                                                    class="badge bg-secondary">{{ $interclub[0]->receiver_team_score }}</span>
                                            </p>
                                        </div>
                                        {{-- collapse start --}}
                                        <p>

                                            <button class="btn text-decoration-underline text-primary my-3" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $interclub[0]->receiver_team_id }}"
                                                aria-expanded="false"
                                                aria-controls="collapse-{{ $interclub[0]->receiver_team_id }}">
                                                En savoir plus le Club
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapse-{{ $interclub[0]->receiver_team_id }}">
                                            <div class="card h-100 border-0">
                                                <div class="card-body">

                                                    <p>Localité : <span class="fw-bold">
                                                        {{ $interclub[0]->receiver_team->locality }}
                                                    </span>
                                                    </p>
                                                    <p>
                                                        Adresse : {{ $interclub[0]->receiver_team->address }}
                                                    </p>
                                                    <p>Province ou Région : {{ $interclub[0]->receiver_team->province }}
                                                    </p>
                                                    <p>Jour d'entrainement :
                                                        {{ $interclub[0]->receiver_team->training_day }}
                                                    </p>
                                                    <p>Horaire: {{ $interclub[0]->receiver_team->training_time }} </p>
                                                    <p>Personne de contact : <span
                                                            class="fw-bold">{{ $interclub[0]->receiver_team->contact_person }}</span>
                                                    </p>
                                                    <p>Adresse email :
                                                        <a href="mailto:{{ $interclub[0]->receiver_team->email }}">
                                                            {{ $interclub[0]->receiver_team->email }}</a>
                                                    </p>
                                                    @if ($interclub[0]->receiver_team->phone_number)
                                                        <p>Tel. {{ $interclub[0]->receiver_team->phone_number }}</p>
                                                    @endif
                                                    @if ($interclub[0]->receiver_team->mobile_number)
                                                        <p>Tel. {{ $interclub[0]->receiver_team->mobile_number }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        {{-- collapse end --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-auto">
                                <div class="card h-100">
                                    <div class="card-body">

                                        <h3 class="card-title mb-4">
                                            <span class="badge bg-warning text-uppercase text-shadow">
                                                {{ $interclub[0]->visitor_team->name }}
                                            </span>
                                        </h3>
                                        <div class="card-text bg-light px-3 py-4 rounded">
                                            <p><i class="bi bi-calendar-check-fill"></i> Date de la rencontre :
                                                <span>{{ $interclub[0]->match_date }}</span>
                                            </p>
                                            <p>Score : <span
                                                    class="badge bg-secondary">{{ $interclub[0]->visitor_team_score }}</span>
                                            </p>
                                        </div>
                                        <p>

                                            <button class="btn text-decoration-underline text-warning my-3" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $interclub[0]->visitor_team_id }}"
                                                aria-expanded="false"
                                                aria-controls="collapse-{{ $interclub[0]->visitor_team_id }}">
                                                En savoir plus le Club
                                            </button>
                                        </p>
                                        <div class="collapse" id="collapse-{{ $interclub[0]->visitor_team_id }}">
                                            <div class="card  h-100 border-0">
                                                <div class="card-body">
                                                    <p>Localité : <span
                                                            class="fw-bold">{{ $interclub[0]->visitor_team->locality }}</span>
                                                    </p>
                                                    <p>
                                                        Adresse : {{ $interclub[0]->visitor_team->address }}
                                                    </p>
                                                    <p>Province ou Région : {{ $interclub[0]->visitor_team->province }}
                                                    </p>
                                                    <p>Jour d'entrainement :
                                                        {{ $interclub[0]->visitor_team->training_day }}
                                                    </p>
                                                    <p>Horaire: {{ $interclub[0]->visitor_team->training_time }} </p>
                                                    <p>Personne de contact : <span
                                                            class="fw-bold">{{ $interclub[0]->visitor_team->contact_person }}</span>
                                                    </p>
                                                    <p>Adresse email :
                                                        <a href="mailto:{{ $interclub[0]->visitor_team->email }}">
                                                            {{ $interclub[0]->visitor_team->email }}</a>
                                                    </p>
                                                    @if ($interclub[0]->visitor_team->phone_number)
                                                        <p>Tel. {{ $interclub[0]->visitor_team->phone_number }}</p>
                                                    @endif
                                                    @if ($interclub[0]->visitor_team->mobile_number)
                                                        <p>Tel. {{ $interclub[0]->visitor_team->mobile_number }}</p>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- comment --}}
                        <div class="row my-4">
                            <div class="col-lg-8 col-md-auto">
                                <div class="card border-0">
                                    <div class="card-body">
                                        <h5 class="card-title">Commentaires</h5>
                                        <p class="bg-light p-3 rounded">
                                            {{ $interclub[0]->comments }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

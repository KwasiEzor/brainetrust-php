@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="row py-5">
            <div class="card p-3 shadow-sm border-0">
                <div class="card-header border-0">
                    <h2 class="card-title text-center p-4">
                        <a href="{{route('clubs.index')}}" class="page-title">
                            Liste des clubs de Scrabble
                        </a>
                    </h2>
                </div>
                <div class="filter-section py-3">
                    <form action="{{route('clubs.index')}}" class="container mx-auto">
                        @csrf
                        <div class="row">
                            <div class="col-6 mx-auto">
                                <div class="form-group mb-3">
                                    <input type="search" class="form-control border-0 p-3 shadow-sm bg-white" name="search" id="searchInput" placeholder="Entrez un mot clé...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-auto">
                                <div class="form-floating">
                                    <select class="form-select border-0 shadow-sm bg-white" id="floatingSelectGrid" name="name">
                                        <option selected >...</option>
                                        @foreach ($clubs as $club )
                                            <option value="{{$club->name}}">{{$club->name}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Nom du Club</label>
                                  </div>
                            </div>
                            <div class="col-md-3 col-sm-auto">
                                <div class="form-floating">
                                    <select class="form-select border-0 shadow-sm bg-white" id="floatingSelectGrid" name="locality">
                                        <option selected >...</option>
                                        @foreach ($clubs as $club )
                                            <option value="{{$club->locality}}">{{$club->locality}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Localité</label>
                                  </div>
                              
                            </div>
                            <div class="col-md-3 col-sm-auto ">
                                <div class="form-floating">
                                    <select class="form-select border-0 shadow-sm bg-white" id="floatingSelectGrid" name="address">
                                        <option selected >...</option>
                                        @foreach ($clubs as $club )
                                            <option value="{{$club->address }}">{{$club->address}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Adresse</label>
                                  </div>
                            </div>
                            <div class="col-md-3 col-sm-auto d-flex align-items-center justify-content-center ">
                                <button class="btn btn-primary btn-lg " type="submit">Recherche <i class="bi bi-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    <table class="table table-hover  table-responsive text-center " style="overflow-x: auto">
                        <thead>
                            <tr>
                                <th scope="col">IDs</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Localité</th>
                                <th scope="col">Province</th>
                                <th scope="col">Pers. de contact</th>
                                <th scope="col">Num. de contact</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @forelse ($clubs as $club)
                                <tr>
                                    <th scope="row">{{ $club->id }}</th>
                                    <td>{{ $club->name }}</td>
                                    <td>{{ $club->address }}</td>
                                    <td>{{ $club->locality }}</td>
                                    <td>{{ $club->province }}</td>
                                    <td>{{ $club->contact_person }}</td>
                                    <td>
                                        <span class="d-block">{{ $club->mobile_number }}</span>
                                        <span class="d-block">{{ $club->phone_number }}</span>
                                    </td>
                                    <td>
                                       
                                        <button  type="button" class="btn showDetails btn-outline-primary" id="detailsBtn" data-id="{{$club->id}}" data-bs-toggle="modal"
                                            data-bs-target="#clubDetailsModal" >
                                            Détails
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="clubDetailsModal" tabindex="-1"
                                            aria-labelledby="clubDetailsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="clubDetailsModalLabel">Details : <span id="club_name"></span> </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class=""><b>Jour d'entraînement : </b> <span id="club_day"></span></p>
                                                        <p class=""><b>Horaire d'entraînement : </b> <span id="club_time"></span></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>
                                </tr>


                            @empty
                                <p class="text-center">No data available</p>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 mx-auto">
                    {{ $clubs->links() }}
                </div>
            </div>
        </div>
        {{-- @include('includes.map') --}}
    </div>
@endsection


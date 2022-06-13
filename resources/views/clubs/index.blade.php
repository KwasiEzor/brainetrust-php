@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="row py-5">
            <div class="card px-4 py-4">
                <h3 class="card-title mb-4">Liste des membres</h3>
                <div class="card-body">
                    <table class="table table-hover  table-responsive text-center " style="overflow-x: auto">
                        <thead>
                            <tr>
                                <th scope="col">IDs</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Localité</th>
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


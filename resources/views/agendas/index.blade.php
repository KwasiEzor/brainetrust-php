@extends('layouts.app')
@section('content')
    <div class="container-xl py-5 agenda__page">
        <div class="row px-4">

            <div class="col">
                <div class="card p-3 shadow-sm border-0">
                    <div class="card-header border-0 bg-white">
                        <h2 class="page__title text-center">Agenda</h2>
                    </div>
                    <div class="filter-section py-3">
                        <form action="{{route('agendas.index')}}" class="container mx-auto">
                            @csrf
                            <div class="row ">
                                <div class="col-md-3 col-sm-auto">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="floatingSelectGrid" name="competition">
                                            <option selected >...</option>
                                            @foreach ($agendas as $agenda )
                                                <option value="{{$agenda->competition}}">{{$agenda->competition}}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelectGrid">Compétitions</label>
                                      </div>
                                </div>
                                <div class="col-md-3 col-sm-auto">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="floatingSelectGrid" name="category">
                                            <option selected >...</option>
                                            @foreach ($categories as $category )
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelectGrid">Catégories</label>
                                      </div>
                                  
                                </div>
                                <div class="col-md-3 col-sm-auto ">
                                    <div class="form-floating">
                                        <select class="form-select border-0" id="floatingSelectGrid" name="serie">
                                            <option selected >...</option>
                                            @foreach ($series as $serie )
                                                <option value="{{$serie->id}}">{{$serie->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelectGrid">Séries</label>
                                      </div>
                                </div>
                                <div class="col-md-3 col-sm-auto d-flex align-items-center justify-content-center ">
                                    <button class="btn btn-primary " type="submit">Recherche <i class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body ">
                        <table class="table table-hover table-responsive-md table-responsive-sm">
                            <thead>
                                <tr>
                                    <th scope="col">Date</th>
                                    <th scope="col">Heure</th>
                                    <th scope="col">Compétition</th>
                                    <th scope="col">Catégories</th>
                                    <th scope="col">Séries</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($agendas as $agenda)
                                    <tr>
                                        <th scope="row">{{date('d-m-Y', strtotime($agenda->event_date))}}</th>
                                        <th> <span class="btn btn-outline-primary">{{$agenda->event_time}}</span>
                                             </th>
                                        <td>
                                            <span class="text-uppercase">
                                                {{ $agenda->competition }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="small text-muted">
                                                {{ $agenda->player_category->name }}
                                            </span>
                                        </td>
                                        <td>{{ $agenda->player_serie->name }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th scope="row">No Data</th>

                                    </tr>
                                @endforelse

                            </tbody>
                        </table>


                    </div>
                </div>
                <div class="mx-auto my-4">
                    {{ $agendas->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

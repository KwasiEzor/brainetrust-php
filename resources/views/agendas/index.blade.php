@extends('layouts.app')
@section('content')
    <div class="container-xl py-5 agenda__page">
        <div class="row px-4">

            <div class="col">
                <div class="card p-3  shadow-sm border-0">
                    <div class="card-header border-0 bg-white mt-3">
                        <h2 class="page__title text-center p-4">
                            <a href="{{ route('agendas.index') }}" class="page-title ">
                                Agendas du Club
                            </a>
                        </h2>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="filter-section py-3">
                        <form action="{{ route('agendas.index') }}" class="container mx-auto">
                            @csrf
                            <div class="row">
                                <div class="col-6 mx-auto">
                                    <div class="form-group mb-3">
                                        <input type="search" class="form-control p-3 " name="search" id="searchInput"
                                            placeholder="Entrez un mot clé...">
                                    </div>
                                </div>
                                <div class="col-6 px-5" style="display: flex; align-items: center; justify-content: end;">
                                    @can('manage-all-content')
                                        <a href="{{route('agendas.create')}}" class="btn btn-lg btn-success me-4">Nouveau Agenda</a>
                                    @endcan
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-3 col-sm-auto">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelectGrid" name="competition">
                                            <option selected>...</option>
                                            @foreach ($agendas as $agenda)
                                                <option value="{{ $agenda->competition }}">{{ $agenda->competition }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelectGrid">Compétitions</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-auto">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelectGrid" name="category">
                                            <option selected>...</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelectGrid">Catégories</label>
                                    </div>

                                </div>
                                <div class="col-md-3 col-sm-auto ">
                                    <div class="form-floating">
                                        <select class="form-select" id="floatingSelectGrid" name="serie">
                                            <option selected>...</option>
                                            @foreach ($series as $serie)
                                                <option value="{{ $serie->id }}">{{ $serie->name }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelectGrid">Séries</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-auto d-flex align-items-center justify-content-center ">
                                    <button class="btn btn-primary btn-lg " id="agendaSearchBtn" type="submit">Recherche <i
                                            class="bi bi-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-body ">
                        <table class="table table-hover table-responsive-md table-responsive-sm agenda-table" id="agenda__table">
                            <thead>
                                <tr>
                                    <th scope="col">Date
                                        <span class="resize-handle"></span>
                                    </th>
                                    <th scope="col">Heure
                                        <span class="resize-handle"></span>
                                    </th>
                                    <th scope="col">Compétition
                                        <span class="resize-handle"></span>
                                    </th>
                                    <th scope="col">Catégories
                                        <span class="resize-handle"></span>
                                    </th>
                                    <th scope="col">Séries
                                        <span class="resize-handle"></span>
                                    </th>
                                    @can('manage-all-content')
                                        
                                    <th scope="col">
                                        Actions
                                        <span class="resize-handle"></span>
                                    </th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($agendas as $agenda)
                                    <tr>
                                        <th scope="row"> <span
                                                class="text-secondary font-normal">
                                                {{-- <span class="btn btn-outline-secondary d-grid">{{ date('j \\ F Y', strtotime($agenda->event_date.'Europe/Brussels')) }}</span> --}}
                                                <span class="">{{ \Carbon\Carbon::parse($agenda->event_date)->locale('fr_BE')->isoFormat('LL')}}</span>
                                                {{-- <span class="btn btn-outline-secondary d-grid">
                                                    <x-date-time date="$agenda->event_date"></x-date-time>
                                                </span> --}}
                                        </th>
                                        <th> 
                                            {{-- <span class="btn btn-outline-primary d-grid">{{ $agenda->event_time }}</span> --}}
                                            <span class="badge bg-primary">{{ date('H:i', strtotime($agenda->event_date)) }}</span>
                                        </th>
                                        <td>
                                            <span class="text-uppercase">
                                                {{ $agenda->competition }}
                                            </span>
                                            <span>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm text-primary" data-bs-toggle="modal"
                                                    data-bs-target="#staticBackdrop-{{$agenda->id}}">
                                                    Plus d'infos
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop-{{$agenda->id}}" data-bs-backdrop="static"
                                                    data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-uppercase" id="staticBackdropLabel">{{$agenda->competition}}
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body bg-light p-3">
                                                                <p><i class="bi bi-calendar-event-fill"></i> 
                                                                  <span class="text-decoration-underline">Date </span> : 
                                                                    <span class="badge bg-primary">{{ \Carbon\Carbon::parse($agenda->event_date)->locale('fr_BE')->isoFormat('LL')}}</span>
                                                                </p>
                                                                <p><i class="bi bi-clock-fill"></i> 
                                                                    <span class="text-decoration-underline">Horaire</span> : 
                                                                    <span class="badge bg-warning">{{ date('H:i', strtotime($agenda->event_date)) }}</span></p>
                                                                <p>
                                                                <p><i class="bi bi-flag-fill"></i> 
                                                                    <span class="text-decoration-underline">Tour </span>: 
                                                                    <span>{{$agenda->competition_round}}</span>
                                                                </p>
                                                                <p><i class="bi bi-clock-fill"></i> 
                                                                    <span class="text-decoration-underline">Minute par tour</span> : 
                                                                    <span>{{$agenda->minute_per_round}}</span></p>
                                                                <p>
                                                                    <i class="bi bi-chat-left-text-fill"></i>
                                                                    <span class="text-decoration-underline">Commentaires </span> :
                                                                </p>
                                                                <p>
                                                                    {{$agenda->details}}
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Fermer</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="small text-muted">
                                                {{ $agenda->player_category->name ?? " " }}
                                            </span>
                                        </td>
                                        <td>{{ $agenda->player_serie->name ?? " " }}</td>
                                        <td>
                                            @can('manage-all-content')
                                            <a class="btn btn-outline-warning" href="{{route('agendas.edit',$agenda)}}"><i class="bi bi-pencil-square"></i></a>
                                        @endcan
                                        @can('manage-all-content')
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['agendas.delete', $agenda->id], 'style' => 'display:inline']) !!}
                                            {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger',]) !!} --}}
                                            <button type="submit" class="btn btn-outline-danger"
                                                onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                                            {!! Form::close() !!}
                                        @endcan
                                        </td>
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

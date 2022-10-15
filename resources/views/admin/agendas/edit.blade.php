@extends('layouts.app')
@section('content')
    <div class="container-xl py-5 agenda__page">
        <div class="container">
            <div class="card p-3  shadow-sm border-0">
                <div class="row px-4 px-md-2">
                    <div class="col-md-8 mx-auto">
                        <div class="card-header border-0 bg-white mt-3">
                            <h2 class="page__title text-center p-4">
                                <a href="#" class="page-title ">
                                    Modifier Agenda
                                </a>
                            </h2>
                        </div>
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="card-body">
    
                            <form action="{{ route('agendas.update',$agenda) }}" method="post" style="display: flex; flex-direction: column;gap:1.5rem">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="event_date" class="form-label">Choisir une date et une heure</label>
                                    <input type="datetime-local" class="form-control @error('event_date') is-invalid @enderror" value="{{ $agenda->event_date ?? old('event_date') }}" name="event_date" id="event_date">
                                </div>
    
                                <div class="form-group">
                                    <label for="competition" class="form-label">Compétition</label>
                                    <input type="text" class="form-control @error('competition') is-invalid @enderror" value="{{$agenda->competition ?? old('competition')}}" name="competition" id="competition">
                                </div>
                                <div class="form-group">
                                    <label for="competition_round" class="form-label">Nombre de tour</label>
                                    <input type="number" class="form-control @error('competition_round') is-invalid @enderror" value="{{$agenda->competition_round ?? old('competition_round')}}" name="competition_round" id="competition_round">
                                </div>
                                <div class="form-group">
                                    <label for="minute_per_round" class="form-label">Minute par tour</label>
                                    <input type="number" class="form-control @error('minute_per_round') is-invalid @enderror" value="{{$agenda->minute_per_round ?? old('minute_per_round')}}" name="minute_per_round" id="minute_per_round">
                                </div>
                                <div class="form-floating">
                                    <select class="form-select @error('player_category_id') is-invalid @enderror" id="floatingSelectGrid" name="player_category_id">
                                        <option selected value={{$agenda->player_category->id ?? null}}>{{$agenda->player_category->name ?? " "}}</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name ?? null  }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Catégories</label>
                                </div>
                                <div class="form-floating">
                                    <select class="form-select @error('player_serie_id') is-invalid @enderror" id="floatingSelectGrid" name="player_serie_id">
                                        <option selected value={{$agenda->player_serie->id ?? null}}>{{$agenda->player_serie->name ?? " "}}</option>
                                        @foreach ($series as $serie)
                                            <option value="{{ $serie->id }}">{{ $serie->name ?? null}}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Séries</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" value="{{$agenda->details}}" name="details" placeholder="Ajouter détails" id="details" style="height: 200px">
                                        {{$agenda->details ?? old('details')}}
                                    </textarea>
                                    <label for="details">Détails</label>
                                </div>
                                <div class="form-group">
                                    <label for="is_highlighted">Mise en avant</label>
                                    <input type="checkbox" name="is_highlighted" id="is_highlighted" value={{$agenda->is_highlighted ?? old('is_highlithed')}}>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

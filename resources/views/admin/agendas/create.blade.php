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
                                    Nouveau Agenda
                                </a>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6 mx-auto">
                        <div class="card-body">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('agendas.store') }}" method="post" style="display: flex; flex-direction: column;gap:1.5rem">
                                @csrf
                                {{-- <div class="form-group">
                                    <label for="event_date" class="form-label">Choisir une date et une heure</label>
                                    <input type="datetime-local" class="form-control" value="{{old('event_date')}}" name="event_date" id="event_date">
                                </div> --}}
                                <div class="input-group">
                                    <input type="datetime-local" class="form-control datetimepicker" placeholder="" aria-label="event_date" name="event_date" value="{{old('event_date')}}">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-event-fill"></i></span>
                                    {{-- @error('event_date')
                                        <div class="invalid-feedback">
                                            
                                        </div>
                                    @enderror --}}
                                </div>
                                  
    
                                <div class="form-group">
                                    <label for="competition" class="form-label">Compétition</label>
                                    <input type="text" class="form-control" value="{{old('competition')}}" name="competition" id="competition">
                                </div>
                                <div class="form-group">
                                    <label for="competition_round" class="form-label">Nombre de tour</label>
                                    <input type="number" class="form-control" value="{{old('competition_round')}}" name="competition_round" id="competition_round">
                                </div>
                                <div class="form-group">
                                    <label for="minute_per_round" class="form-label">Minute par tour</label>
                                    <input type="number" class="form-control" value="{{old('minute_per_round')}}" name="minute_per_round" id="minute_per_round">
                                </div>
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelectGrid" name="player_category_id">
                                        <option selected value="{{old('player_category_id')}}"></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Catégories</label>
                                </div>
                                <div class="form-floating">
                                    <select class="form-select" id="floatingSelectGrid" name="player_serie_id">
                                        <option selected value="{{old('player_serie_id')}}"></option>
                                        @foreach ($series as $serie)
                                            <option value="{{ $serie->id }}">{{ $serie->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="floatingSelectGrid">Séries</label>
                                </div>
                                <div class="form-floating">
                                    <textarea class="form-control" name="details" placeholder="Ajouter détails" value="{{old('details')}}" id="details" style="height: 200px">
                                        {{old('details')}}
                                    </textarea>
                                    <label for="details">Détails</label>
                                </div>
                                <div class="form-group">
                                    <label for="is_highlighted">Mise en avant</label>
                                    <input type="checkbox" name="is_highlighted" id="is_highlighted" value="{{old('is_highlighted')}}">
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
@push('custom-script')
    <script>
        $(function () {

        $('.datetimepicker').datetimepicker();

        });
    </script>
@endpush

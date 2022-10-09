@extends('layouts.app')

@section('content')
    <div class="container-xl">

        <div class="container ">
            <div class="row ms-4 me-2">
                <div class="col-8 mx-auto">
                    <h2 class="page__title text-center mt-5">
                        <a href="{{ route('scgames.index') }}" class="page-title ">
                            Amicales
                        </a>
                    </h2>
                </div>
            </div>
            <div class="row mb-5">
                <div class=" col-md-6 col-sm-auto  mt-4 mb-0 mx-auto">
                    <form action="{{route('scgames.index')}}" method="GET" role="search">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-white p-3 border-0 shadow-sm" placeholder="Enter keyword..."
                                aria-label="query" aria-describedby="query" name="query" id="query">
                            <button type="submit" class="input-group-text btn btn-outline-primary px-3 fs-4 shadow-sm" id="search-btn"><i
                                    class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row gy-4">
                @forelse ($scgames as $scGame )
                    <div class="col-lg-4 col-md-6 col-sm-auto">
                        <div class="card border-0 rounded h-100 w-100">
                            <div class="card-header border-0 bg-white">
                                <h5 class="card-title">{{$scGame->competition}}</h5>
                            </div>
                            <img src="{{asset('images/scrabble-duplicate.png')}}" alt="duplicate grille" class="img-fluid">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between ">
                                    <span class="user-profile">
                                        Arbitre : 
                                             <b>{{$scGame->user->name}}</b>       
                                    </span>
                                    <span class="text-primary">
                                        <small>
                                            <i class="bi bi-calendar-event-fill me-1"></i> 
                                            {{$scGame->created_at->diffForHumans()}}
                                        </small>
                                    </span>
                                </div>
                                <h6 class="my-3">Commentaires :</h6>
                                <p class="card-text bg-light p-3">
                                    {{$scGame->comments}}
                                </p>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-end">
                             {{-- <a class="btn btn-outline-primary me-3" href="{{$scGame->report_sheet}}" download="{{$scGame->report_sheet}}" >
                               fichier
                                <i class="bi bi-download"></i> --}}
                                
                            </a>   
                                <a href="{{route('scgames.show',$scGame->id)}}" class="">Voir détails <i class="bi bi-arrow-right-square-fill"></i></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-center">No data avaible</p>
                @endforelse
            </div>
            <div class="mx-auto my-4">
                {{ $scgames->links() }}
            </div>
        </div>

    </div>
@endsection

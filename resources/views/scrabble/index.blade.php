@extends('layouts.app')
@section('content')

<div class="container-xl p-5">
    <div class="row about__page">
        <div class="container">
            <div class="card p-5 border-0 shadow-sm ">
                <h2 class="card-title text-center text-primary py-4 page-title">Tout savoir sur le jeu</h2>
                <div class="card-body">
                        @foreach ($scrabbleData as $data)
                        <h4>{{$data->title}}</h4>
                        <small class=" text-primary">{{$data->description}}</small>
                        <p class="card-content align-text-justify lh-base text-muted">
                            {{ $data->rule }}
                        </p>
                        @endforeach
                        <h4>Les variantes du Scrabble Duplicate</h4>
                        <ul class="list-group-numbered border-0">
                            @foreach ($scrabbleTypes as $type )

                            <li class="list-item">
                                <span class="fw-bold">{{$type->name}}</span>
                                <p class="text-muted">{{$type->description}}</p>
                            </li>
                                
                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
    </div>
</div>
    
@endsection
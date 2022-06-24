@extends('layouts.app')
@section('content')
    <div class="container-xl p-5 p-md-3 p-sm-2">
        <div class="row about__page">
            <div class="container-xl">
                <div class="card p-5 border-0 shadow-sm ">
                    <h2 class="card-title text-center text-primary py-4 page-title">Tout savoir sur le jeu</h2>
                    <div class="card-body">
                        @foreach ($scrabbleData as $data)
                            
                          
                            <h4 class="">{{ $data->title }}</h4>
                            <small class=" text-primary mb-3">{{ $data->description }}</small>
                            <p class="card-content align-text-justify lh-base text-muted bg-light p-3">
                                {{ $data->rule }}
                            </p>
                            <div class="row">
                            @if ($data->cover_img_one || $data->cover_img_two || $data->cover_img_three  )
                                @if ($data->title === 'Connaissez-vous le Scrabble ?')
                                <div class="col-md-12 col-sm-auto mb-4">
                                    <figure class="figure h-100 w-100">
                                        <img class=" figure-img  rounded mb-4 h-100 w-100 " style="object-fit: cover" src="{{$data->cover_img_one}}"/>
                                        <figcaption></figcaption>
                                    </figure>
                                </div> 
                                @else
                                <div class="col-md-4 col-sm-auto mb-4">
                                    <figure class="figure h-100 w-100">
                                        <img class=" figure-img  rounded mb-4 h-100 w-100 " style="object-fit: cover" src="{{$data->cover_img_one}}"/>
                                        <figcaption></figcaption>
                                    </figure>
                                </div>
                                @endif
                                @if ($data->cover_img_two)
                                <div class="col-md-4 col-sm-auto mb-4">
                                    <figure class="mb-4 figure h-100 w-100">
                                        <img class=" figure-img  rounded mb-4 h-100 w-100"  style="object-fit: cover" src="{{$data->cover_img_two}}"/>
                                        <figcaption></figcaption>
                                    </figure>
                                </div> 
                                @endif
                                @if ($data->cover_img_three)  
                                <div class="col-md-4 col-sm-auto mb-4">
                                    <figure class="figure h-100 w-100">
                                        <img class=" figure-img img-fluid rounded mb-4 h-100 w-100" style="object-fit: cover" src="{{$data->cover_img_three}}"/>
                                        <figcaption></figcaption>
                                    </figure>
                                </div>
                                @endif
                            @else
                        </div>
                            <p> </p>
                        @endif
                        @endforeach

                    </div>
                </div>
                <div class="card p-5  border-info shadow-sm">
                    <h4 class="card-title px-4 mb-3">Les variantes du Scrabble Duplicate</h4>
                    <ul class="list-group-numbered border-0">
                        @foreach ($scrabbleTypes as $type)
                            <li class="list-item">
                                <span class="fw-bold">{{ $type->name }}</span>
                                <p class="text-muted">{{ $type->description }}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

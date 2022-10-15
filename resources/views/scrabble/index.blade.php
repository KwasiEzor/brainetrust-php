@extends('layouts.app')
@section('content')
    <div class="container-xl p-lg-5 p-md-4 p-sm-3">
        <div class="row">
                <div class="card p-lg-5 p-md-4 p-sm-3 border-0 shadow-sm ">
                    <h2 class="card-title text-center text-primary py-4 page-title">le Scrabble</h2>
                    <div class="card-body">
                        <div class="row scrabble-presentation-box mb-5">
                            <div class="col-lg-10 col-md-auto col-sm-12 mx-auto ">
                                <div class="card video-box">
                                    <div class="card-body">
                                        <video controls class="presentation-video" poster="{{asset('images/scrabble-poster.png')}}">
        
                                            <source type="video/WebM" src="{{asset('videos/scrabble-presentation-web.webm')}}">
                                        </video>
                                    </div>
                                </div>
                                <p class="p-3">Source YouTube : <a href="https://www.youtube.com/c/Scrabblophile" target="_blank"> Scrabblophile </a></p>
                            </div>
                        </div>
                        @foreach ($scrabbleData as $data)
                            
                          
                            <h4 class="">{{ $data->title }}</h4>
                            <small class=" text-primary mb-3">{{ $data->description }}</small>
                            <p class="card-content align-text-justify lh-base text-muted bg-light w-100 ">
                                {{ $data->rule }}
                            </p>
                            
                            <div class="row">
                            @if ($data->cover_img_one || $data->cover_img_two || $data->cover_img_three  )
                                @if ($data->title === 'Connaissez-vous le Scrabble ?')
                                <div class="col-md-4 col-sm-auto mb-4">
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
                <div class="card p-lg-5 p-md-4 p-sm-3 border-info shadow-sm">
                    <h4 class="card-title mb-3">Les variantes du Scrabble Duplicate</h4>
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
@endsection

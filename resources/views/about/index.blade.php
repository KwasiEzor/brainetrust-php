@extends('layouts.app')
@section('content')

<div class="container-xl py-5">
    <div class="row about__page">
        <div class="card p-4 border-0 shadow-sm">
            <h2 class="page-title text-center ">Qui sommes-nous ?</h2>
            <div class="container pt-4">
                <div class="row">
                    <div class="col-lg-6 col-md-auto mx-auto d-flex align-items-center">
                        <figure class="figure">
                            <img src="{{asset('images/commune-bla.jpg')}}" alt="image" class="figure-img img-fluid rounded" style="max-width: 90%;width:fit-content;">
                            <figcaption class="text-center text-muted"></figcaption>
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-auto mx-auto d-flex align-items-center">
                        <figure class="figure">
                            <img src="{{asset('images/salle-communale-ophain.jpg')}}" alt="image" class="figure-img img-fluid rounded" style="max-width: 90%;width:fit-content;">
                            <figcaption class="text-center text-muted">Salle Communale d'Opahin</figcaption>
                        </figure>
                    </div>
                </div>
                @foreach ($aboutData as $key => $about )
                    <div class="card p-3 mb-3">
                        <h4 class="card-title about-title">{{ $about->title }}</h4>
                        <p class="card-body bg-light p-3">
                            {{ $about->content }}
                        </p>
                    </div>     
                   
                @endforeach
            </div>
        </div>
    </div>
</div>
    
@endsection
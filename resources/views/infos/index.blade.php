@extends('layouts.app')
@section('content')

<div class="container-xl py-5">
    <div class="row about__page">
        <div class="card p-4 border-0 shadow-sm">
            <h2 class="page-title text-center ">Infos pratiques</h2>
            <div class="container pt-4">
                @foreach ($aboutData as $key => $about )
                    <div class="card p-3 mb-3">
                        <h4 class="card-title about-infos">{{ $about->title }}</h4>
                        <p class="card-body bg-light">
                            {{ $about->content }}
                        </p>
                    </div>     
                   
                @endforeach
            </div>
        </div>
    </div>
</div>
    
@endsection
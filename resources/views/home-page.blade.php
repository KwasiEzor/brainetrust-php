@extends('layouts.app')
@section('content')
    <div class="container-xl home-page">
        {{-- Hero section start --}}
        <div class="row hero__section">
            <div class="col-md-6 col-sm-auto hero__section__left">
                <div class="section__left__content">
                    <h3>Bienvenue</h3>
                    <h3>au</h3>
                    <h1 class="home__title text-uppercase">Braine</h1>
                    <div class="hero-image-box">
                        <img src="{{ asset('images/trust-logo.svg') }}" class="img-fluid"
                            style="max-width: 90%; width:fit-content;" alt="image trust" srcset="">
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-auto hero__section__right">
                <img src="{{ asset('images/scrabble-hero-bg.png') }}" style="max-width: 96%; width:fit-content;"
                    alt="image scrabble" class="img-fluid">
            </div>
            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <figure class="figure">
                            <img class="figure-img img-fluid rounded" src="{{ asset('images/badge-carousel-ods.svg') }}"
                                alt="image">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="figure">
                            <img class="figure-img img-fluid rounded"
                                src="{{ asset('images/badge-carousel-scrabble.svg') }}" alt="image">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="figure">
                            <img class="figure-img img-fluid rounded" src="{{ asset('images/badge-duplicate.svg') }}"
                                alt="image">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="figure">
                            <img class="figure-img img-fluid rounded" src="{{ asset('images/badge-carousel-ods.svg') }}"
                                alt="image">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="figure">
                            <img class="figure-img img-fluid rounded"
                                src="{{ asset('images/badge-carousel-scrabble.svg') }}" alt="image">
                            <figcaption></figcaption>
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure class="figure">
                            <img class="figure-img img-fluid rounded" src="{{ asset('images/badge-duplicate.svg') }}"
                                alt="image">
                            <figcaption></figcaption>
                        </figure>
                    </div>

                </div>
                {{-- <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div> --}}
                <div class="swiper-pagination"></div>
            </div>
            
        </div>
        {{-- Hero section end --}}

        {{-- Scrabble presentation area --}}
        <div class="container-xl ">
            <div class="row  mb-5">
                <h4 class="page-title">A découvrir</h4>
            </div>
            <div class="row bg-white discover-section  pb-4">
                <div class="col-lg-6 col-md-auto">
                    <figure class="figure">
                        <img src="{{asset('images/scrabble-jetons.svg')}}" alt="image scrabble" class="figure-img img-fluid rounded">
                        <figcaption></figcaption>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-auto">
                    <div class="content">
                        <h1 class="text-primary">Le Scrabble</h1>
                        <h3>toutes </h3>
                        <h2>ses Variantes</h2>
                    </div>
                </div>
            </div>
            <div class="row bg-white discover-section py-4">
                <div class="col-lg-6 col-md-auto">
                    <div class="content left">
                        <h1 class="text-primary">Le Duplicate</h1>
                        <h3>pour tester</h3>
                        <h2>vos Connaissances</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-auto">
                    <figure class="figure">
                        <img src="{{asset('images/scarbble-duplicate.svg')}}" alt="image scrabble" class="figure-img img-fluid rounded">
                        <figcaption></figcaption>
                    </figure>
                </div>
            </div>
            <div class="row bg-white discover-section py-4">
                <div class="col-lg-6 col-md-auto">
                    <figure class="figure">
                        <img src="{{asset('images/scrabble-classique-duel.svg')}}" alt="image scrabble" class="figure-img img-fluid rounded">
                        <figcaption></figcaption>
                    </figure>
                </div>
                <div class="col-lg-6 col-md-auto">
                    <div class="content">
                        <h1 class="text-primary">Le Classique</h1>
                        <h3>partager de</h3>
                        <h2>bons Moments</h2>
                    </div>
                </div>
            </div>
        </div>
        {{-- Scrabble presentation area end --}}
        {{-- Become Member start --}}
        <div class="container-xl mt-5 ">
            <div class="container p-lg-4 p-md-3 p-sm-2 bg-primary rounded-3">
                <h1 class="text-center text-white mt-4 text-shadow">Envie de nous <span class="badge bg-warning">Rejoindre</span> ?</h1>
                <div class="row welcome-section pb-4 gy-md-4 gy-sm-4">
                    <div class="col-lg-6 col-md-6 col-sm-auto welcome-img-box">
                        <figure class="figure welcome-man">
                            <img src="{{asset('images/welcome-man.png')}}" alt="Welcome man" class="figure-img img-fluid rounded " >
                        </figure>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-auto welcome-text-box mt-sm-4 ">
                        <div class="d-flex justify-content-end align-items-center flex-column">
                            <h5 class="text-white text-right pt-3 text-shadow">Saisissez cette Opportunité </h5>
                            <h6 class="text-white text-right text-shadow">Inscrivez-vous Maintenant  </h6>
                            <a href="{{route('register')}}" class="btn btn-lg d-block btn-warning w-50 my-3 text-uppercase" id="join-btn">Je commence <i class="bi bi-arrow-right-square-fill"></i></a>
                        </div>
                        <div class="card border-0 bg-white shadow p-3">
                            <div class="card-body">
                                <ul class="list-group ">
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-check-circle-fill text-success fs-4"></i> Pour <span class="text-decoration-underline">participer</span>  à différentes Compétitions
                                    </li>
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-check-circle-fill text-success fs-4"></i> Pour <span class="text-decoration-underline">s'entrainer</span>  avec de vrais Champions
                                    </li>
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-check-circle-fill text-success fs-4"></i> Pour <span class="text-decoration-underline">améliorer </span>rapidement votre Niveau
                                    </li>
                                    
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-check-circle-fill text-success fs-4"></i> Pour <span class="text-decoration-underline">découvrir</span>  d'autres Endroits
                                    </li>
                                    <li class="list-group-item border-0">
                                        <i class="bi bi-check-circle-fill text-success fs-4"></i> Pour <span class="text-decoration-underline">faire</span>  de belles Rencontres
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Become Member end --}}
        {{-- Partners section start --}}
        <div class="container-xl mt-5 partners-section">
            <div class="row mt-5 partners-area text-center">
                <div class="col-lg-3 col-md-6 col-sm-auto partner">
                    <a href="https://www.fisf.net/" target="_blank" rel="noopener noreferrer">
                        <figure class="figure">
                            <img src="{{asset('images/fisf_logo.png')}}" alt="logo" class="figure-img img-fluid rounded">
                        </figure>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-auto partner">
                    <a href="https://www.ffsc.fr/index.php?accueil" target="_blank" rel="noopener noreferrer">
                        <figure class="figure">
                            <img src="{{asset('images/ffsc.png')}}" alt="logo" class="figure-img img-fluid rounded">
                        </figure>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-auto partner">
                    <a href="https://scrabble.fbsc.be/" target="_blank" rel="noopener noreferrer">
                        <figure class="figure">
                            <img src="{{asset('images/fbs.png')}}" alt="logo" class="figure-img img-fluid rounded">
                        </figure>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-auto partner">
                    <a href="https://www.scrabbleouistreham.fr/" target="_blank" rel="noopener noreferrer">
                        <figure class="figure">
                            <img src="{{asset('images/logo-club-ouistreham.png')}}" alt="logo" class="figure-img img-fluid rounded">
                        </figure>
                    </a>
                </div>
            </div>
        </div>
        {{-- Partners section end --}}
        {{-- Recent posts section --}}
        <div class="container-xl mt-5">
            <div class="row  mb-5">
                <h4 class="page-title">Dernières publications</h4>
            </div>
            <div class="row recent-posts">
                @forelse ($recentPosts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-auto  mb-5 ">

                        <div class="card  w-100 h-100 border-info shadow">
                            <img 
                             @if (substr($post->image_url,0,6) ==='images')
                            src="{{ asset('storage/'.$post->image_url) }}"  
                            @else
                                src="{{$post->image_url}}"
                            @endif class="card-img mb-3" 
                            alt="image">
                            <h5 class="card-title px-3">{{ $post->title }}</h5>
                            <div class="card-title px-3 d-flex align-items-center justify-content-between">
                                <small> <b>Catégorie : </b> <span class="text-primary text-capitalize">
                                        {{ $post->category->name }} </span> </small>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="card-body">
                                <p class="card-text text-muted bg-light p-2 rounded-3">
                                    {!! Str::limit($post->content, 120) !!}
                                </p>
                            </div>
                            <div class=" p-3 d-flex justify-content-end ">
                                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-warning ">Voir
                                    plus</a>
                            </div>
                        </div>

                    </div>
                @empty
                    <p>Aucun article disponible</p>
                @endforelse
            </div>
        </div>
        {{-- Recent posts section --}}
        {{-- social media link start --}}
        <div class="container-xl mt-5 social-media-section">
            <div class="row mt-5 social-media " id="social-media">
                <h5>Vous pouvez aussi nous suivre sur les réseaux sociaux</h5>
                <a href="https://www.facebook.com/groups/66131026195/" target="_blank" class="social-link">
                    <i class="bi bi-facebook"></i> facebook
                </a>
            </div>
        </div>
        {{-- social media link end --}}

    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container-xl home-page">
        <div class="row hero__section">
            <div class="col-md-6 col-sm-auto hero__section__left">
                <div class="section__left__content">
                    <h3>Bienvenu</h3>
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
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                {{-- <div class="swiper-pagination mt-3"></div> --}}
            </div>

        </div>
        <div class="container-xl">
            <div class="row ">
                <h4 class="title mb-4">Dernières publications</h4>
            </div>
            <div class="row recent-posts">
                @forelse ($recentPosts as $post)
                    <div class="col-lg-4 col-md-6 col-sm-auto  mb-5 ">

                        <div class="card  w-100 h-100 border-info shadow">
                            <img src="{{ $post->image_url }}" class="card-img mb-3" alt="image">
                            <h5 class="card-title px-3">{{ $post->title }}</h5>
                            <p class="card-title px-3 d-flex align-items-center justify-content-between">
                                <small> <b>Catégorie : </b> <span class="text-primary text-capitalize">
                                        {{ $post->category->name }} </span> </small>
                                <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                            </p>
                            <div class="card-body">
                                <p class="card-text text-muted bg-light p-2 rounded-3">
                                    {{ Str::limit($post->content, 120) }}
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
    </div>
@endsection

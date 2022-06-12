@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="row">
            <h2>Tag :  <span class="text-primary">{{$tag->name}}</span> </h2>
            <p>Back to Tags page <a href="{{route('tags.index')}}" class=""><i class="bi bi-arrow-left-square-fill" style="font-size: 1.2rem; vertical-align:middle; "></i></a> </p>
        </div>
        <div class="row py-5">
            <h2>Articles</h2>
        </div>
        <div class="row articles-list">
            <div class="col-md-9">

                @forelse ( $posts as $post )
                <div class=" col-lg-4 col-md-6 col-sm-auto mt-5 mb-4 ">
                    <div class="card p-2 w-100 h-100">
                        <img src="{{ $post->image_url}}" class="card-img mb-3" alt="image">
                        <h5 class="card-title px-3">{{ $post->title }}</h5>
                        <div class="card-body">
                            <p class="card-text">
                                {{ Str::limit($post->content, 120) }}
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('posts.show', $post) }}" class="btn btn-outline-primary ">Voir
                                plus</a>
                        </div>
                    </div>
                </div>  
                @empty
                    <p>No Articles  avaible </p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container-xl">

        <div class="row ">
            <div class="row">
                <div class=" col-md-6 col-sm-auto  mt-4 mb-0 mx-auto">
                    <form action="{{route('posts.search')}}" method="POST" role="search">
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
            <div class="col-md-9">
                <div class="row pt-4 pb-5">
                    @isset($posts)
                        @foreach ($posts as $post)
                            <div class=" col-lg-4 col-md-6 col-sm-auto mt-5 mb-0 ">
                                <div class="card p-2 w-100 h-100 border-0 shadow-sm">
                                    <img src="{{ $post->image_url}}" class="card-img mb-3" alt="image">
                                    <h5 class="card-title px-3">{{ $post->title }}</h5>
                                    <div class="card-body">
                                        <p class="card-text text-muted">
                                            {{ Str::limit($post->content, 120) }}
                                        </p>
                                    </div>
                                    <div class=" p-3 d-flex justify-content-end ">
                                        <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-outline-primary ">Voir
                                            plus</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="mx-auto my-4">
                    {{ $posts->links() }}
                </div>
               
            </div>
            {{-- SIDEBAR --}}
            
            @include('inc.sidebar')

        </div>

    </div>
@endsection

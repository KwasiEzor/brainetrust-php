@extends('layouts.app')

@section('content')
    <div class="container-xl">

        <div class="container ">
            <div class="row">
                <div class=" col-md-6 col-sm-auto  mt-4 mb-0 mx-auto">
                    <form action="{{ route('posts.search') }}" method="POST" role="search">
                        @csrf
                        <div class="input-group mb-3">
                            <input type="text" class="form-control bg-white p-3 border-0 shadow-sm"
                                placeholder="Enter keyword..." aria-label="query" aria-describedby="query" name="query"
                                id="query">
                            <button type="submit" class="input-group-text btn btn-outline-primary px-3 fs-4 shadow-sm"
                                id="search-btn"><i class="bi bi-search"></i></button>
                        </div>
                    </form>
                </div>
                @can('manage-all-content')
                    <div class="col-lg-6 col-md-auto d-flex align-items-center justify-content-center">
                        <!-- Button trigger modal -->
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">
                            Nouveau article
                        </a>

                    </div>
                @endcan
            </div>

            <div class="row">
                <div class="col-md-9">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <p>{{ $message }}</p>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row pt-4 pb-5">
                        @isset($posts)
                            @foreach ($posts as $post)
                            
                                <div class=" col-lg-4 col-md-6 col-sm-auto mt-5 mb-0 ">
                                    <div class="card  w-100 h-100 border-0 shadow-sm">
                                        <img @if (substr($post->image_url,0,6) ==='images')
                                        src="{{ asset('storage/'.$post->image_url) }}"  
                                        @else
                                            src="{{$post->image_url}}"
                                        @endif
                                    class="card-img mb-3" alt="image" >
                                        <h5 class="card-title px-3">{{ $post->title }}</h5>
                                        <div class="card-body">
                                            <p class="card-text text-muted bg-light p-2 rounded-3">
                                                {{ Str::limit($post->content, 120) }}
                                            </p>
                                        </div>
                                        <div class=" p-3 d-flex justify-content-end gap-3 ">
                                            @can('manage-all-content')
                                                <a class="btn btn-outline-warning" href="{{route('posts.edit',$post)}}"><i class="bi bi-pencil-square"></i></a>
                                            @endcan
                                            @can('manage-all-content')
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['posts.delete', $post->id], 'style' => 'display:inline']) !!}
                                                {{-- {!! Form::submit('Delete', ['class' => 'btn btn-danger',]) !!} --}}
                                                <button type="submit" class="btn btn-outline-danger"
                                                    onclick="return confirm('Are you sure?')"><i class="bi bi-trash"></i></button>
                                                {!! Form::close() !!}
                                            @endcan
                                            <a href="{{ route('posts.show', $post->slug) }}"
                                                class="btn btn-outline-primary ">Voir
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
                @include('inc.sidebar')
            </div>
            {{-- SIDEBAR --}}


        </div>

    </div>
@endsection

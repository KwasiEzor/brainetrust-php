@extends('layouts.app')
@section('content')
    <div class="container-xl py-5 agenda__page">
        <div class="row">
            <h2 class="page__title">Détails article : </h2>
        </div>
        <div class="row py-5">
            <div class="col-md-9">
                <div class="row justify-content-center">

                    <div class="col-auto ">
                        <div class="card py-3 px-3 w-100 h-100">
                            <img src="{{ $post[0]['image_url'] }}" class="card-img mb-3" alt="image">
                            <h3 class="card-title px-3">{{ $post[0]['title'] }}</h3>
                            <h6 class="cart-header d-flex align-items-center justify-content-between px-4">
                                <span class="author w-50 h-50"> 
                                    <img src="{{asset('images/default-user.png')}}"  class="rounded-circle me-2" onerror="{{asset('images/default-user.png')}}" class=" ms-2" alt="author image"
                                        style="width:50px; height:50px; border-radius:50%;">
                                    Author : <small class="text-italic">{{ $post[0]->user->name }}</small>
                                </span>
                                <span class="me-3">
                                    <small class="text-muted"> Published :
                                        <em>{{ $post[0]['created_at']->diffForHumans() }}</em> </small>
                                </span>
                            </h6>
                            <div class="card-body">
                                <p class="card-text">Category : <a href="{{route('category.posts',$post[0]['category'])}}"
                                        class="text-capitalize fw-bold">{{$post[0]['category']->name}}</a> </p>
                                <p class="card-text">Tags :
                                    @foreach ($post[0]['tags'] as $tag)
                                        <span class="badge bg-success"> {{ $tag->name }} </span> |
                                    @endforeach
                                </p>

                                <p class="card-text text-secondary text-justify p-3 bg-light" style="text-align: justify;">
                                    {!! $post[0]['content'] !!}
                                </p>
                            </div>
                            <div class="card-footer text-end">
                                <p class="d-flex align-items-center justify-content-end">
                                    <span>Partager sur :</span>
                                    @foreach ($socialButtons as $key =>$value )
                                        <a class="fs-4 mx-1 py-1 px-2 btn btn-outline-primary" target="_blank" href="{{$value}}">
                                            @switch($key)
                                                @case('facebook')
                                                    <i class="bi bi-facebook"></i>
                                                    @break
                                                @case('twitter')
                                                    <i class="bi bi-twitter"></i>
                                                    @break
                                                @case('linkedin')
                                                    <i class="bi bi-linkedin"></i>
                                                    @break
                                                @case('whatsapp')
                                                    <i class="bi bi-whatsapp"></i>
                                                    @break
                                                @case('telegram')
                                                    <i class="bi bi-telegram"></i>
                                                    @break
                                            
                                                @default
                                                    
                                                <i class="bi bi-facebook"></i>
                                            @endswitch
                                        </a>
                                    @endforeach
                                </p>
                                <p class="d-flex align-items-center justify-content-end">
                                    <a href="{{route('contact-page')}}" class="btn btn-sm btn-outline-danger">Signaler <i class="bi bi-flag-fill"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
              
                   
                </div>
                <div class="mx-auto my-4">
                    <div class="card my-4 p-3">
                        <div class="card-body">
                            <h5 class="card-title">Comments</h5>
                            <ul class="list-group">

                                @foreach ($post[0]->comments as $comment )
                                <li class="list-group border-0 mb-2">
                                    <p class="card-text text-secondary text-justify">
                                        {{$comment->content}}
                                   </p>  
                                   <small class="card-text d-flex justify-content-between">
                                       <span>
                                        <img src="{{asset('images/default-user.png')}}" class="rounded-circle" style="width: 50px; height:50px; margin-right:1rem; opacity:0.7; " alt="default user">
                                         <b>From :</b>  {{$comment->user->name}}
                                       </span>
                                       <span>
                                           {{-- {{dd($comment)}} --}}
                                           <small class="text-muted"> <em>{{$comment->created_at->diffForHumans()}}</em> </small>
                                       </span>
                                   </small>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="card p-2">
                     
                        <div class="card-body">

                            <form action="/posts/{{$post[0]->id}}/comments" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control mb-3" placeholder="Your comments.." name="content" id="content" cols="30" rows="10"></textarea>
                                </div>
                               
      
                                <div class="form-group">
                                    <button type="submit" value="Add Comment" onclick="return confirm('Vous devez connecter avant ?')" class="form-control btn btn-primary" style="max-width: 10rem">Add Comment <i class="bi bi-send-fill"></i></button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="card p-2 mt-4">
                        <div class="card-body p-2">
                            <h5 class="card-title">Autres articles</h5>

                            <ul class="post-carousel list-group-horizontal-sm p-0">
                                @foreach ($otherCategoryPosts as $post )
                                    <li class="list-group-item item border-0">
                                        <div class="card">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                  <img src="{{$post->image_url}}" class="img-fluid rounded-start" alt="image">
                                                </div>
                                                <div class="col-md-8">
                                                  <div class="card-body">
                                                    <h5 class="card-title">{{$post->title}}</h5>
                                                    <small>Categorie : <span class="fw-bold text-primary">{{$post->category->name}}</span> </small>
                                                    <p class="card-text bg-light p-3">
                                                        {{ Str::limit($post->content, 120) }}
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">{{$post->created_at->diffForHumans()}}</small></p>
                                                    <div class="d-flex justify-content-end">
                                                        <a class="btn btn-outline-primary" href="{{route('posts.show',$post->slug)}}">Suite <i class="bi bi-arrow-right-square-fill"></i></a>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
             {{-- SIDEBAR --}}
            @include('inc.sidebar')
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="container-xl py-5 agenda__page">
        <div class="row">
            <h2 class="page__title">Détails article : </h2>
        </div>
        <div class="row py-5">
            <div class="col-md-9  py-3">
                <div class="row justify-content-center">

                    <div class="col-auto ">
                        <div class="card p-2 w-100 h-100">
                            <img src="{{ $post[0]['image_url'] }}" class="card-img mb-3" alt="image">
                            <h3 class="card-title px-3">{{ $post[0]['title'] }}</h3>
                            <h6 class="cart-header d-flex justify-content-between">
                                <span class="author w-50 h-50">
                                    {{-- {{dd($post->user)}} --}}
                                    {{-- <img src="{{ $post->user->images[0]['url'] }}" class=" ms-2" alt=""
                                        style="width:50px; height:50px; border-radius:50%;">
                                    Author : <small class="text-italic">{{ $post->user->name }}</small> --}}
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

                                <p class="card-text text-secondary text-justify" style="text-align: justify;">
                                    {{ $post[0]['content'] }}
                                </p>
                            </div>
                            <div class="card-footer">
                                
                            </div>
                        </div>
                    </div>
              
                   
                </div>
                <div class="mx-auto my-4">
                    <div class="card my-4">
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
                    <div class="card">
                     
                        <div class="card-body">

                            <form action="/posts/{{$post[0]->id}}/comments" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control mb-3" placeholder="Your comments.." name="content" id="content" cols="30" rows="10"></textarea>
                                </div>
                               
      
                                <div class="form-group">
                                    <input type="submit" value="Add Comment" class="form-control btn btn-primary" style="max-width: 10rem">
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
             {{-- SIDEBAR --}}
            @include('inc.sidebar')
        </div>
    </div>
@endsection
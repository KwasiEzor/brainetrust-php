<div class="col-md-3 mt-0 sidebar " style="margin-top: 4.2rem !important;">
    {{-- categories --}}
    <div class="categories mt-0">
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title px-3">Catégories</h5>
                <ol class="list-group list-group-numbered ">
                    @foreach ($categories as $category)
                        <li class="list-group-item border-0">
                        <a href="{{route('category.posts',$category)}}" class="text-capitalize">{{ $category->name }}       
                            <span class="badge bg-primary rounded-pill">{{ $category->posts->count() }}</span></a> 
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
    {{-- recent posts --}}
    <div class="recent-posts mt-4">
        <div class="card mt-0 border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title px-3 ">Articles récents</h5>
                <ul class="list-group">
                    @foreach ($posts as $post )
                        <li class="list-group-item border-0">
                           
                            <a href="{{ route('posts.show', $post->slug) }}">
                                {{$post->title}}

                                <small class="text-muted d-inline-block text-align-right">
                                    <em>{{ $post->created_at->diffForHumans() }}</em>
                                    
                                </small>
                            </a>
                            
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    {{-- tags --}}
    <div class="post-tags mt-4">
        <div class="card mt-2 border-0 shadow-sm">
            <div class="card-body">
                <h5 class="card-title px-3 ">Mots clés <a href="{{route('tags.index')}}"><small>voir tout</small> <i class="bi bi-arrow-right-square-fill"></i></a></h5>
                <div class="tags">
                    @foreach ($tags as $tag )
                        <a href="{{ route('tags.show',$tag)}}" class="btn btn-outline-success btn-sm mb-1">
                            {{$tag->name}}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
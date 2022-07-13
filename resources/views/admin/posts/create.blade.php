@extends('layouts.app')
@section('content')
    <div class="container-xl py-4 px-3">
        <div class="row">
            <div class="col-lg-8 col-md-auto mx-auto">
                <div class="card p-3">
                    <div class="card-body">
                        <form action="{{route('posts.store')}}" method="POST" class="addPostForm d-flex flex-column gap-2 p-3" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                               <label for="title" class="form-label">Titre</label>
                               <input type="text" id="title" class="form-control" name="title" placeholder="Titre" required >
                            </div>
                            <div class="form-group">
                                <label for="content" class="form-label">Contenu</label>
                                <textarea name="content" id="content" cols="30" rows="10" class="form-control resize-none" placeholder="Ajouter un contenu" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image_url" class="form-label">Ajouter une image</label>
                                <input type="file" class="form-control" name="image_url"  >
                            </div>
                            <div class="form-group">
                                <label for="video_url" class="form-label">Lien video</label>
                                <input type="text" id="video_url" class="form-control" name="video_url" placeholder="ajouter un lien video"  >
                            </div>
                            
                            
                            <div class="input-group my-3">
                                <label class="input-group-text" for="inputGroupSelect01">Catégories</label>
                                <select class="form-select" id="inputGroupSelect01" name="category_id">
                                    <option selected>Choisir...</option>
                                    @foreach ($categories as $category )
                                        
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="is_published">Publier article</label>
                                <input type="checkbox" name="is_published" id="is_published">
                            </div>
                                  
                    
                            <div class="form-group d-grid">
                                <button type="submit" class="btn btn-success">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
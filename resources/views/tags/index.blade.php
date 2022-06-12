@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="row">
            
            <h2>All Tags :</h2>
            <div class="col-auto p-3">
                @foreach ($tags as $tag )
                <a href="{{ route('tags.show',$tag) }}" class="btn btn-outline-success btn-sm mb-1">
                    {{$tag->name}}
                </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
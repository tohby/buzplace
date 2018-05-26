@extends('layouts.app')
@section('content')
    <div class="container">
            <h3><i class="fas fa-tags"> Tagged posts:</i></h3>
            <hr>
        @if(count($posts) > 0) @foreach($posts as $post)
            <div class="card mb-3">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        @foreach($post->postsphoto as $key => $photo)
                        <div class="carousel-item item{{ $key == 0 ? ' active' : '' }} ">
                            <img class="card-img-top" src="/storage/upload/{{$photo->filename}}" alt="Los Angeles" width="1100" height="500">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-body shadow-lg">
                    <h3 class="card-title"><a href="/posts/{{$post->id}}"><strong>{{$post->title}}</strong></a></h3>
                    <p class="card-text">{{Str::words($post->body, 60, '......')}}</p>
                    <p class="card-text"><small class="text-muted">Posted {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small></p>
                </div>
            </div>
            @endforeach
            @else
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">No Posts Found</h5>
                    <p class="card-text">Oops, it's not you, it's us. Kindly reload your web browser!</p>
                </div>
            </div>
            @endif
    </div>
@endsection
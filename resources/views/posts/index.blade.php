@extends('layouts.app') 
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <hr/>
            <div class="list-group mb-3">
                <a class="list-group-item list-group-item-action" href="/myposts">My Posts</a>
                <a class="list-group-item list-group-item-action" href="/profile">My Profile</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#createPost">
                    Create New Post
                </button>
                @include('posts.create')
                <!-- Modal -->     
            </div>
            <br/> @if(count($posts) > 0) @foreach($posts as $post)
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
                    <p class="card-text"><small class="text-muted">Posted {{$post->created_at->diffForHumans()}} by <a href="/profile/{{$post->user_id}}">{{$post->user->name}}</a></small></p>
                <p></p>
                </div>
            </div>
            @endforeach {{$posts->links()}} @else
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">No Posts Found</h5>
                    <p class="card-text">Oops, it's not you, it's us. Kindly reload your web browser!</p>
                </div>
            </div>
            @endif
        </div>
        <div class="col-md-3">
            <hr/>
            <div class="card">
               <div class="card-body">
                    <h4>Tags</h4>
                @foreach($tags as $tag)
                    <span class="align-baseline">
                        <a class="btn btn-outline-secondary" href="/tags/{{$tag}}">{{$tag}}</a> 
                    </span>
                @endforeach
               </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
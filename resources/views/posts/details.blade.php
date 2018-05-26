@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="clearfix">
                <div class="float-left">
                    <h3 class="card-title"><strong>{{ucfirst($posts->title)}}</strong></h3>
                </div>
                <div class="float-right">
                    @if(count($posts->price))
                    <h2 class="card-title">${{$posts->price}}</h3>
                        @endif
                </div>
            </div>
            <div class="container">
                <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
                <img id="expandedImg" style="width:100%">
            </div>

            <script>
                function myFunction(imgs) {
                          var expandImg = document.getElementById("expandedImg");
                          expandImg.src = imgs.src;
                          imgText.innerHTML = imgs.alt;
                          expandImg.parentElement.style.display = "block";
                      }
            </script>
            <!-- The four columns -->
            <div class="row justify-content-center">
                @foreach($posts->postsPhoto as $photo)
                <div class="column">
                    <img src="/storage/upload/{{$photo->filename}}" style="width:100%" onclick="myFunction(this);">
                </div>
                @endforeach
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="clearfix">
                        <span class="float-left">
                            <div class="d-flex">
                                <div class="p-2">
                                    <h4 class="card-title"><a href="/profile/{{$posts->user_id}}">{{ucfirst($posts->user->name)}}</a></h4>
                                </div>
                                <div class="p-2">
                                    <small> - {{$posts->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        </span>
                        <span class="float-right">
                            @if($posts->negotiable == 1)
                                <small>Negotiable</small>
                            @else
                            <small>Non-negotiable</small>
                            @endif
                        </span>
                    </div>
                    <p class="card-text">{{ucfirst($posts->body)}}</p>
                </div>
                <div class="card-footer">
                    @if(count($posts->tags))
                    <h5><i class="fas fa-tags"> Tags:</i></h5> @foreach($posts->tags as $tag)
                    <span class="align-baseline">
                                <a class="btn btn-outline-secondary" href="/tags/{{$tag->name}}">{{$tag->name}}</a> 
                            </span> @endforeach @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <br/> @if(auth()->user()->id == $posts->user_id)
            <button type="button" class="btn btn-lg btn-block float-right text-white" style="background-color: #9395d3;" data-toggle="modal"
                data-target="#createPost">
                        Edit This Post
                </button>

            <!-- Modal -->
    @include('posts.edit')
            <!-- Button trigger modal -->

            <button type="button" style="margin-top: 20px;" class="btn btn-lg btn-danger btn-block float-right text-white" data-toggle="modal"
                data-target="#deleteModal">
                    Delete This Post
                </button>

            <!-- Modal -->
    @include('posts.delete') @else
            <a href="mailto:{{$posts->user->email}}" class="btn btn-primary btn-lg btn-block float-right">Contact the owner</a>            @endif
        </div>
    </div>
</div>
@include('layouts.footer')
@endsection
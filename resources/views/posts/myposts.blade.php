@extends('layouts.app') 
@section('content') @if(count($posts) > 0)
<div class="container">
    @foreach($posts as $post)
    <div class="m-2">
        <div class="card bg-light text-dark">
            <div class="card-body">
                <div class="clearfix">
                        <span class="float-left">
                                <h4 class="card-title"><strong>{{$post->title}}</strong></h4>
                                <small class="card-text">Posted {{$post->created_at->diffForHumans()}}</small>
                        </span>
                        <span class="float-right">
                                <a href="/posts/{{$post->id}}" class="btn btn-info" role="button">View Post</a>
                        </span>             
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @else 
    <div class="container">
    <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">No Posts Found</h5>
                <p class="card-text">Oops, you do not have any posts!</p>
            </div>

    </div>
    </div>
     @endif
</div>
@include('layouts.footer')
@endsection
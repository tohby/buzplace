@extends('layouts.app')
@section('content')
<div class="container">
    @if(count($posts) > 0)
        @foreach ($posts as $post)
        <div class="card">
            <div class="card-header"><a href="/posts/{{$post->id}}"><strong>{{$post->title}}</strong></a></div>
        <div class="card-body">{{Str::words($post->body, 50, '......')}}</div> 
            <div class="card-footer"><p class="card-text"><small class="text-muted">Posted {{$post->created_at->diffForHumans()}} by {{$post->user->name}}</small></p></div>
          </div><p></p>
        @endforeach
        {{$posts->links()}}
    @else
        Oops, nothing relates to your search in our database
    @endif
</div>
@endsection
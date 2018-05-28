@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <a href="/news/create" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Add News</a>
        @if(count($news) > 0)
        @foreach($news as $newsItem)
        <div class="row">
            <div class="col-sm-10">
                <div class="card mb-3">
                     <div class="card-body">
                        <h5 class="card-title">{{$newsItem->title}}</h5>
                        <p class="card-text">{!!$newsItem->news_article!!}</p>
                    </div>             
                </div>
            </div>
            <div class="col-sm-2 mt-4">
                    <div class="float-right">
                            <a href="/news/{{$newsItem->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                @include('news.delete')
                    </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
@endsection
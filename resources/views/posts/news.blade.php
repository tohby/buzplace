@extends('layouts.app') 
@section('content')
    @if(count($news) > 0)
        @foreach($news as $newsItem)
        <div class="justify-content-lg-center">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                        <div class="card m-3">
                                @if($newsItem->image !== 'null')
                                    <img class="card-img-top" src="/storage/newsImages/{{$newsItem->image}}" alt="Card image cap">
                                    @endif           
                                <div class="card-body">
                                <h5 class="card-title">{{$newsItem->title}}</h5>
                                    <p class="card-text">{!!$newsItem->news_article!!}</p>
                                    <a href="#" class="btn btn-primary float-right">Read</a>
                                </div>
                            </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
        @endforeach
    @endif
@endsection
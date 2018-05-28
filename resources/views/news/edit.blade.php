@extends('layouts.master')
@section('content')
    <h3>Edit News</h3>
    <hr>
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{action("NewsController@update", "$newsItem->id")}}">
            @csrf
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Title" value="{{$newsItem->title}}">
            </div>
            <div class="form-group">
                <label for="message">Body:</label>
                <textarea class="form-control" name="news_article" rows="10" id="article-ckeditor" >{{$newsItem->news_article}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Image:</label>
                <input type="file" class="form-control" accept="image/*"  name="image" placeholder="Image">
            </div>
            <input type="hidden" name="_method" value="put" />
            <button type="submit" class="btn btn-dark float-right"><i class="far fa-paper-plane"></i> Update</button>
        </form>
    </div>
@endsection
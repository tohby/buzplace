@extends('layouts.master')
@section('content')
    <h3>Upload Directories</h3>
    <hr>
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{action("NewsController@store")}}">
            @csrf
            <div class="form-group">
                <label for="name">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="message">Body:</label>
                <textarea class="form-control" name="news_article" rows="10" id="article-ckeditor" ></textarea>
            </div>
            <div class="form-group">
                <label for="name">Image:</label>
                <input type="file" class="form-control" accept="image/*"  name="image" placeholder="Image">
            </div>
            <button type="submit" class="btn btn-dark float-right"><i class="far fa-paper-plane"></i> Submit</button>
        </form>
    </div>
@endsection
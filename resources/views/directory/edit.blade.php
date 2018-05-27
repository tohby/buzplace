@extends('layouts.master')
@section('content')
    <h3>Upload Directories</h3>
    <hr>
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{action("DirectoriesController@update", "$directory->id")}}">
            @csrf
            <div class="form-group">
                <label for="name">Company Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Company Name" value="{{$directory->name}}">
            </div>
            <div class="form-group">
                <label for="message">Details:</label>
                <textarea class="form-control" name="details" rows="10">{{$directory->details}}</textarea>
            </div>
            <div class="form-group">
                <label for="name">Location:</label>
                <input type="text" class="form-control"  name="location" placeholder="Location" value="{{$directory->location}}">
            </div>
            <input type="hidden" name="_method" value="put" />
            <button type="submit" class="btn btn-dark float-right"><i class="far fa-paper-plane"></i> Update</button>
        </form>
    </div>
@endsection
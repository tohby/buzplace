@extends('layouts.master')
@section('content')
    <h3>Upload Directories</h3>
    <hr>
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data" action="{{action("DirectoriesController@store")}}">
            @csrf
            <div class="form-group">
                <label for="name">Company Name:</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
            </div>
            <div class="form-group">
                <label for="message">Details:</label>
                <textarea class="form-control" name="details" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Location:</label>
                <input type="text" class="form-control"  name="location" placeholder="Location">
            </div>
            <button type="submit" class="btn btn-dark float-right"><i class="far fa-paper-plane"></i> Submit</button>
        </form>
    </div>
@endsection
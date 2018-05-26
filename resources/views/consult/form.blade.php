@extends('layouts.app') 
@section('content')
<div class="container">
    <h1>
        Contact us for our consultancy services
    </h1>
    <p>Need help or advice from our professional consulting team? Drop a quick message and we'll get back to you as quickly as possible.</p>
    <hr>
<form method="POST" enctype="multipart/form-data" action="{{action("ConsultController@store")}}">
    @csrf
        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" cols="30" rows="10"></textarea>
        </div>
        <button type="submit" class="btn btn-dark float-right"><i class="far fa-paper-plane"></i> Send</button>
    </form>
</div>
@endsection
@extends('layouts.master') 
@section('content')
<div class="container-fluid">
    @if(count($consults) > 0) @foreach ($consults as $consult)
    <div class="card bg-light m-5 border
                        ">
        <div class="card-body">
            <h5 class="card-title">From: <strong>{{$consult->user->name}}</strong><small>({{$consult->user->email}})</small></h5>
            <h4 class="card-text">Subject: <strong>{{$consult->subject}}</strong></h4>
            <h6 class="card-text">{{$consult->message}}</h6>
        </div>
    </div>
    @endforeach @endif
</div>
@endsection
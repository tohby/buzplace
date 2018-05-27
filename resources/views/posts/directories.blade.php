@extends('layouts.app')
@section('content')
<div class="container-fluid">
        @if(count($directories) > 0) @foreach($directories as $directory)
        <div class="card m-3">
            <div class="card-body">
                <h3 class="card-title">{{$directory->name}}</h3>
                <p class="card-text">
                        {{$directory->details}}
                </p>
                <small class="float-right">
                    {{$directory->location}}
                </small>
            </div>
        </div>
        @endforeach
        @endif
    </div>
@endsection